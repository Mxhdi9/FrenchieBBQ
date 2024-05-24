import serial
import mysql.connector
from mysql.connector import Error

# Configuration du port série
ser = serial.Serial('/dev/ttyUSB0', 9600, timeout=1)
ser.flush()

# Fonction pour insérer les données dans la base de données
def insert_data(latitude, longitude):
    try:
        connection = mysql.connector.connect(
            host='localhost',
            database='frenchiebbq',
            user='Naw',
            password='Apstrlp24@'
        )
        if connection.is_connected():
            cursor = connection.cursor()
            cursor.execute("INSERT INTO localisation (latitude, longitude) VALUES (%s, %s)", (latitude, longitude))
            connection.commit()
            cursor.close()
            connection.close()
            print("Données enregistrer dans la base de données")
    except Error as e:
        print("Erreur de connexion à MySQL", e)

while True:
    if ser.in_waiting > 0:
        line = ser.readline().decode('utf-8').rstrip()
        if line.startswith("Latitude:"):
            try:
                latitude = float(line.split(":")[1].strip())
                longitude = float(ser.readline().decode('utf-8').rstrip().split(":")[1].strip())
                insert_data(latitude, longitude)
            except ValueError as e:
                print("Erreur de récupération des données GPS", e)
