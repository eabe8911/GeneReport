import tempfile
import time,datetime
import os
import io
from io import BytesIO
from flask import Flask, request, jsonify
from PyPDF2 import PdfWriter, PdfReader
from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import A4
from PIL import Image
import base64

app = Flask(__name__)

@app.route('/', methods=['GET', 'POST']) # type: ignore
def get_or_post_data():
    if request.method == 'GET':
        return jsonify({'result': 'Welcome to Libobio'})
    elif request.method == 'POST':
        try:
            # Get JSON data from request
            payload = request.get_json()
            if not payload:
                return jsonify({'message': 'no input data provided'}), 400
            # Get the base64 encoded PDF data
            pdf_file = payload['pdf_file']
            # Get the base64 encoded signature image data
            signature_image = payload['signature_image']
            X = int(payload['X'])
            Y = int(payload['Y'])
            W = int(payload['W'])
            H = int(payload['H'])
            page_number = payload['page_number'] - 1
            date = payload['date']
            # Check if page number is valid
            if page_number < 0:
                return jsonify({'message': 'Invalid page number'}), 400
            # Add the signature image to the PDF
            output_data = add_image_text_to_pdf(pdf_file, signature_image, date, page_number, X, Y, W, H)
            # Return the base64 encoded output PDF
            return jsonify({'pdf_file': output_data}), 200
        except Exception as e:
            return jsonify({'message': 'An error occurred wile processing the request', 'error':str(e)}), 500

def add_image_text_to_pdf(pdf_base64, img_base64, date, pagenum, x, y, w, h):
    # Convert base64 data to BytesIO
    pdf_data = BytesIO(base64.b64decode(pdf_base64))
    # Convert the base64 encoded signature image data to a PNG stream
    signature_image = Image.open(io.BytesIO(base64.b64decode(img_base64)))
    # Create a temporary file to store the signature image
    temporary_file = tempfile.NamedTemporaryFile(suffix='.png', delete=True)
    signature_image.save(temporary_file, format="PNG")
    # temporary_file.close()

    # temporary_file = str(time.mktime(datetime.datetime.today().timetuple()))+'.png'
    # signature_image.save(temporary_file, format="PNG")
    # Read the existing PDF
    existing_pdf = PdfReader(pdf_data)
    output = PdfWriter()
    # Get page size
    # page_size = existing_pdf.pages[0].mediabox
    # Create a new PDF with Reportlab
    packet = BytesIO()
    c = canvas.Canvas(packet, pagesize=A4)
    # w, h = A4
    # c.drawImage(50, h - 50, "hello world")
    # c.showPage()
    # c.save()
    w = 80
    h = 30
    x1, y1 = A4
    c.drawImage(temporary_file.name, x, y1 - y, width=w, height=h)
    text = c.beginText(x + w + 10, y1 - y)
    text.setFont("Helvetica", 10)
    text.textLine(date)
    c.drawText(text)
    c.showPage()
    c.save()
    
    # Move to the beginning of the StringIO buffer
    packet.seek(0)
    new_pdf = PdfReader(packet)
    if pagenum >= len(existing_pdf.pages):
        return "Error: page number out of range"

    for i in range(len(existing_pdf.pages)):
        # Read a page from the existing PDF
        page = existing_pdf.pages[i]
        if i == pagenum:
            # Merge the Reportlab-created PDF page with the existing PDF page
            page.merge_page(new_pdf.pages[0])
        # Add the page to the new PDF
        output.add_page(page)
    # Write the output PDF to a BytesIO object
    output_stream = BytesIO()
    output.write(output_stream)
    # Convert the output PDF to a base64 encoded string
    output_base64 = base64.b64encode(output_stream.getvalue()).decode('utf-8')
    # Delete the temporary image file
    temporary_file.close()

    return output_base64

if __name__ == '__main__':
    app.run(host='0.0.0.0', debug=True, port=5000)
