import sys, os
from datetime import datetime
import smtplib
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email import encoders

def send_email(DOCX, Combine_list, HTML):

    #fromaddr = 'lish740106@gmail.com'
    fromaddr = 'liboreport@libobio.com'
    #toaddr = ['leslie.chen@libobio.com, brian.chi@libobio.com, ryan.li@libobio.com']
    toaddr = ['tina.xue@libobio.com']
    #cc = 'ryan.li@libobio.com'
    msg = MIMEMultipart()
    msg['From'] = fromaddr
    msg['To'] = ','.join(toaddr)
    #msg['cc'] = cc
    msg['Subject'] = 'You have a PFI report (' + Combine_list.split('.')[0].split('/')[-1] + ')'
    body =  Combine_list.split('.')[0].split('/')[-1] + ' completed at ' + datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    msg.attach(MIMEText(body, 'plain'))

    files = [DOCX, Combine_list, HTML]

    for filename_path in files:
        filename = filename_path.split('/')[-1]
        attachment = open(filename_path, 'rb')
        part = MIMEBase("application", "octet-stream")
        part.set_payload(attachment.read())
        encoders.encode_base64(part)
        part.add_header("Content-Disposition", f"attachment; filename= {filename}")
        msg.attach(part)

    msg = msg.as_string()

    try:
        server = smtplib.SMTP('smtp.office365.com', 587)
        server.ehlo()
        server.starttls()
        server.login(fromaddr, 'wtsnksrdxjyvdtrs')
        server.sendmail(fromaddr, toaddr, msg)
        server.quit()
        print('Email sent successfully')
    except:
        print("Email couldn't be sent")




print("#####sent_email_v2.py###")
DOCX = sys.argv[1]
Combine_list = sys.argv[2]
HTML = sys.argv[3]


#report = 'JB21_254_1_PFI_BGI_data_Report_auto.docx'
send_email(DOCX, Combine_list, HTML)
