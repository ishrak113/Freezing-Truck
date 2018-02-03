/*
  ESP8266: send data to your Domain (or mine: Embedded-iot.net/dht11/dataCollector.php)(

  Uses POST command to send DHT data to a designated website
  The circuit:
  * DHT
  * Post to Domain

   Stephen Borsay
   Homepage: Embedded-iot.net
   www.udemy.com/all-about-arduino-wireless
   https://www.hackster.io/detox
   https://github.com/sborsay/Arduino_Wireless
*/

#include "ESP8266WiFi.h"
#include "DHT.h"
#define DHTPIN 14    // what digital pin we're connected to  pin2 to D4 on esp board

// Uncomment whatever DHT sensor type you're using!
#define DHTTYPE DHT11  // DHT 11
//#define DHTTYPE DHT21  // DHT 21
//#define DHTTYPE DHT22  // DHT 22

DHT dht(DHTPIN,DHTTYPE);

const char server[] = "embedded-iot.net"; 

const char* MY_SSID = "Ishrak";
const char* MY_PWD =  "120105113";

WiFiClient client;


void setup()
{
  Serial.begin(115200);
  dht.begin();
  Serial.print("Connecting to "+*MY_SSID);
  WiFi.begin(MY_SSID, MY_PWD);
  Serial.println("going into wl connect");

  while (WiFi.status() != WL_CONNECTED) //not connected,  ...waiting to connect
    {
      delay(1000);
      Serial.print(".");
    }
  Serial.println("wl connected");
  Serial.println("");
  Serial.println("Credentials accepted! Connected to wifi\n ");
  Serial.println("");
}

void loop() {

   // Wait a few seconds between measurements.
  delay(2000);

  //prefer to use float, but package size or float conversion isnt working
  //will revise in future with a string fuction or float conversion function

  //int Humidity = dht.readHumidity();
  int Humidity=400;
  // Read temperature as Celsius (the default)
  //int Temperature_Cel = dht.readTemperature();
  int Temperature_Cel=500;
  // Read temperature as Fahrenheit (isFahrenheit = true)
  //int Temperature_Fehr = dht.readTemperature(true);
  int Temperature_Fehr=600;

  // Check if any reads failed and exit early (to try again).
  if (isnan(Humidity) || isnan(Temperature_Cel) || isnan(Temperature_Fehr))
  {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  // Compute heat index in Fahrenheit (the default)
  int HeatIndex_Fehr = dht.computeHeatIndex(Temperature_Fehr, Humidity);
  // Compute heat index in Celsius (isFahreheit = false)
  int HeatIndex_Cel = dht.computeHeatIndex(Temperature_Cel, Humidity, false);

  Serial.print("Humidity: ");
  Serial.print(Humidity);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(Temperature_Cel);
  Serial.print(" *C ");
  Serial.print(Temperature_Fehr);
  Serial.print(" *F\t");
  Serial.print("Heat index: ");
  Serial.print(HeatIndex_Cel);
  Serial.print(" *C ");
  Serial.print(HeatIndex_Fehr);
  Serial.println(" *F\n");

    Serial.println("\nStarting connection to server..."); 
  // if you get a connection, report back via serial:
  if (client.connect(server, 80)) {
    Serial.println("connected to server");
    WiFi.printDiag(Serial);

    String data = "Humidity="
          +                        (String) Humidity
          +  "&Temperature_Cel="  +(String) Temperature_Cel
          +  "&Temperature_Fehr=" +(String) Temperature_Fehr
          +  "&HeatIndex_Cel="    +(String) HeatIndex_Cel
          +  "&HeatIndex_Fehr="   +(String) HeatIndex_Fehr;

     client.println("POST /dht11/dataCollector.php HTTP/1.1"); //change this if using your Sub-domain
     client.print("Host: embedded-iot.net\n");                 //change this if using your Domain
     client.println("User-Agent: ESP8266/1.0");
     client.println("Connection: close"); 
     client.println("Content-Type: application/x-www-form-urlencoded");
     client.print("Content-Length: ");
     client.print(data.length());
     client.print("\n\n");
     client.print(data);
     client.stop(); 
     
     Serial.println("\n");
     Serial.println("My data string im POSTing looks like this: ");
     Serial.println(data);
     Serial.println("And it is this many bytes: ");
     Serial.println(data.length());       
     delay(2000);
    } 

}


void printWifiStatus() {
  // print the SSID of the network you're attached to:
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  // print your WiFi shield's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

  // print the received signal strength:
  long rssi = WiFi.RSSI();
  Serial.print("signal strength (RSSI):");
  Serial.print(rssi);
  Serial.println(" dBm");
}
