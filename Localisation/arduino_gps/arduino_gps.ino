#include <TinyGPS++.h>
#include <SoftwareSerial.h>

// Définir les broches de connexion pour le GPS
static const int RXPin = 4, TXPin = 3;
static const uint32_t GPSBaud = 9600;

// Créer une instance de la bibliothèque TinyGPS++
TinyGPSPlus gps;

// Créer une instance de SoftwareSerial pour communiquer avec le GPS
SoftwareSerial ss(RXPin, TXPin);

void setup() {
  // Initialiser la communication série pour le débogage
  Serial.begin(9600);
  // Initialiser la communication série avec le GPS
  ss.begin(GPSBaud);
  Serial.println("Démarrage du GPS...");
}

void loop() {
  // Lire les données du GPS lorsqu'elles sont disponibles
  while (ss.available() > 0) {
    char c = ss.read();
    Serial.write(c);  // Affiche les données brutes reçues du GPS pour diagnostic
    gps.encode(c);
  }

  // Vérifier si la position GPS a été mise à jour
  if (gps.location.isUpdated()) {
    // Afficher la latitude et la longitude
    Serial.print("Latitude= ");
    Serial.print(gps.location.lat(), 6);
    Serial.print(" Longitude= ");
    Serial.println(gps.location.lng(), 6);
  } else {
    Serial.println("Aucune mise à jour de la position disponible");
  }

  // Affiche des informations supplémentaires pour le diagnostic
  Serial.print("Satellites: ");
  Serial.println(gps.satellites.value());
  Serial.print("HDOP: ");
  Serial.println(gps.hdop.value());
  Serial.print("Altitude: ");
  Serial.println(gps.altitude.meters());

  // Ajouter un petit délai pour éviter une boucle trop rapide
  delay(5000);
}
