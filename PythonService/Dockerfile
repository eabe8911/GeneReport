# Use an official Python runtime as a parent image
FROM python:3.9 as base

# Set the working directory in the container to /app
WORKDIR /app

# Add the current directory to the container as /app
# ADD ./PythonService/. /app

# Install any needed packages specified in requirements.txt
# COPY ./PythonService/requirements.txt /app
# RUN pip install --no-cache-dir -r requirements.txt
# RUN pip install -U flask-cors
RUN pip3 install flask
RUN pip3 install img2pdf
RUN pip3 install PyPDF2
RUN pip3 install reportlab
RUN pip3 install Pillow
ENV FLASK_ENV="docker"
ENV FLASK_APP="app.py"
# Copy the current directory contents into the container at /app

# Make port 80 available to the world outside this container
EXPOSE 5000

FROM base as debug
RUN pip3 install debugpy
ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

RUN pip3 install gunicorn
COPY . /app

# Define environment variable
# ENV NAME World

# Run app.py when the container launches
CMD ["gunicorn", "--reload", "--bind", "0.0.0.0:5000", "app.py"]
