#include <max6675.h>

#include <SPI.h>
#include "max6675.h"

int thermoDO = D6; // Connectez le fil DO du MAX6675 à la broche D6 de l'ESP8266
int thermoCS = D7; // Connectez le fil CS du MAX6675 à la broche D7 de l'ESP8266
int thermoCLK = D5; // Connectez le fil CLK du MAX6675 à la broche D5 de l'ESP8266

MAX6675 thermocouple(thermoCLK, thermoCS, thermoDO);

void setup() {
  Serial.begin(9600);
  pinMode(thermoCS, OUTPUT);
  digitalWrite(thermoCS, HIGH);
  
  Serial.println("MAX6675 test");
  delay(500);
}

void loop() {
  // Lire la température en Celsius et Fahrenheit
  double celsius = thermocouple.readCelsius();
  double fahrenheit = thermocouple.readFahrenheit();
  
  // Afficher les valeurs de température sur le moniteur série
  Serial.print("Température en Celsius: ");
  Serial.print(celsius);
  Serial.print(" °C\t");
  Serial.print("Température en Fahrenheit: ");
  Serial.print(fahrenheit);
  Serial.println(" °F");
  
  delay(1000); // Attendre une seconde avant la prochaine lecture
}


