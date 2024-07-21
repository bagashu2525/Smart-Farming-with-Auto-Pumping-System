#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>
//#include <ArduinoJson.h>

const char *ssid = "pooja"; //Enter your WIFI ssid
const char *password = "@Paul1996"; //Enter your WIFI password
const char *server_url = "http://192.168.0.124:3000/postData";// Nodejs application endpoint
//StaticJsonDocument<256> jsonBuffer;
// Set up the client objet
WiFiClient client;
HTTPClient http;
int value=300;
int newstatus=0;
int oldstatus=0;
int lowmoisturelevel=1024;
int highmoisturelevel=250;
int soilmoisturepercent=0;
// Sensor pins
#define sensorPower D7
#define sensorPin A0

void setup() {
  pinMode(sensorPower, OUTPUT);
  pinMode(D2,OUTPUT);
  
  // Initially keep the sensor OFF
  digitalWrite(sensorPower, HIGH);
  pinMode(sensorPin,INPUT);
   delay(3000);
  Serial.begin(9600);
  WiFi.begin(ssid, password);
   while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
   }
   Serial.println("WiFi connected");
   delay(1000);
}

void loop() {
  //get the reading from the function below and print it
  Serial.print("Analog output: ");
  delay(1000);
  value=readSensor();
  Serial.println(value);
  soilmoisturepercent=map(value,lowmoisturelevel,highmoisturelevel,0,100);
  Serial.println(soilmoisturepercent);
  if(soilmoisturepercent>40){
    //Serial.println("moiture in soil detected");
    
    digitalWrite(D2,LOW);
    if(newstatus!=oldstatus){
      soilpost(soilmoisturepercent);
    }
    newstatus=0;
  }
  else{
    newstatus=1;
    digitalWrite(D2,HIGH);
    soilpost(soilmoisturepercent);
    delay(1000);
  }
  
  delay(5000);
}

//  This function returns the analog soil moisture measurement
int readSensor() {
  digitalWrite(sensorPower, HIGH);  // Turn the sensor ON
  delay(10);              // Allow power to settle
  int val = analogRead(sensorPin);  // Read the analog value form sensor
  digitalWrite(sensorPower, LOW);   // Turn the sensor OFF
  return val;             // Return analog moisture value
}
void soilpost(int value){
  http.begin(client, server_url);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
   String data="&voltage=" + String(value);
    int httpCode = http.POST(data);
    if(httpCode > 0){
      if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          String payload = http.getString();
          Serial.print("Response: ");//Serial.println(payload);
        }
    }else{
         Serial.printf("[HTTP] GET... failed, error: %s");
    }
    http.end();
}
