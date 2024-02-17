from io import BytesIO
import sys
from reportlab.pdfgen import canvas
from PyPDF2 import PdfWriter, PdfReader
from PIL import Image
import img2pdf

def create_text_object(text, position):
    """
    Create a new PDF text object with the specified text and position.
    """
    packet = BytesIO()
    can = canvas.Canvas(packet)
    can.drawString(int(position['X']), int(position['Y']), text)
    can.save()

    # Move to the beginning of the StringIO buffer
    packet.seek(0)

    # Create a new PDF reader from the StringIO buffer
    text_obj = PdfReader(packet).pages[0]

    return text_obj

try:
    pdf_file = sys.argv[1]
    signature_image = sys.argv[2]
    X = tuple(sys.argv[3])
    Y = sys.argv[4]
    W = sys.argv[5]
    H = sys.argv[6]
    page_number = sys.argv[7]
    date = sys.argv[8]
    # pdf_file = 'C:\\Users\\asoma\\reporter\\PHPService\\uploads\\JB23_155.pdf'
    # signature_image = 'C:\\Users\\asoma\\reporter\\PHPService\\signature\\max.png'
    # X = '100'
    # Y = '100'
    # W = '100'
    # H = '100'
    # page_number = '2'
    # date = '2023-06-13'
    # Load the existing PDF file
    existing_pdf = PdfReader(pdf_file)

    # Load the signature image
    with open(signature_image, 'rb') as f:
        signature_image_data = f.read()
    signature_image = Image.open(BytesIO(signature_image_data))
    # Create a new PDF writer
    output = PdfWriter()
    # Iterate over each page in the PDF
    for i, page in enumerate(existing_pdf.pages):
        # Only modify the page if it's the specified page number
        if i+1 == int(page_number):
            # Convert the signature image to a PDF form
            with BytesIO() as pdf_output:
                signature_image.save(pdf_output, format='PNG')
                pdf_output.seek(0)
                img2pdf.convert(pdf_output, outputstream=pdf_output)
                pdf_img = pdf_output.getvalue()

            # Add the signature image to the page at the specified position
            overlay = PdfReader(BytesIO(pdf_img)).pages[0]
            page.merge_page(overlay)
            
            # Add the date to the page
            date_text = f"{date}"
            position = {'X': X , 'Y': Y}
            date_text_obj = create_text_object(date_text, position)
            page.merge_page(date_text_obj)

        # Add the page to the output PDF
        output.add_page(page)

    # Write the modified PDF to a file
    with open(pdf_file, "wb") as f:
        output.write(f)
    print('success')
except Exception as e:
    print(e)