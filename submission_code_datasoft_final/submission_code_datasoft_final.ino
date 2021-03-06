#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <DHT.h> 
#include <SoftwareSerial.h> 
//#include <TinyGPS++.h>
#define DHTPIN D5          //pin where the dht11 is connected
DHT dht(DHTPIN, DHT11);
int id= 8069;
//static const int RXPin = 12, TXPin = 13;
//static const uint32_t GPSBaud = 9600;


const char server[] = "techkarigar.com"; 
// repace your wifi username and password
const char* ssid     = "Ishrak";
const char* password = "120105113";

//TinyGPSPlus gps; // create gps object 
WiFiClient  client;
//WiFiServer server(80);  // open port 80 for server connection

// The serial connection to the GPS device
//SoftwareSerial ss(RXPin, TXPin);

void setup(){ 
  dht.begin();
  
Serial.begin(115200);
 // ss.begin(GPSBaud);

  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
   Serial.println("");
  Serial.println("WiFi connected");  
  //starting the server
    //server.begin();
    Serial.println("Server started.");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());
} 

void loop(){ 
  if(WiFi.status()== WL_CONNECTED)
 // while(ss.available()){ // check for gps data 
 // if(gps.encode(ss.read()))// encode gps data 
//  {  
//{
 // Serial.print(F("Location: ")); 
 // if (gps.location.isValid())
 // {

   // double latitude = (gps.location.lat());
   // double longitude = (gps.location.lng());
  //  String latbuf;
  //  latbuf += (String(latitude, 6));
    Serial.print("id=");
    Serial.println(id);
    int temp;
    float t = dht.readTemperature();  
    temp=(int)t;
    //String tempbuf;
    //int t=10; 
    //tempbuf+= (String(t));    
    Serial.print("temperature = ");
    Serial.print(temp); 
    Serial.println("*C");
    
    double latitude=23.773787;
    String latbuf;
     latbuf += (String(latitude, 6));
    Serial.print("latitude = ");
    Serial.println(latbuf);
    
    
    double longitude=90.366679;
    String lonbuf;
    lonbuf += (String(longitude, 6));
   // String lonbuf;
  //  lonbuf += (String(longitude, 6));
    Serial.print("longitude = ");
    Serial.println(lonbuf);
    
    

    Serial.println("\nStarting connection to server..."); 

  // if you get a connection, report back via serial:

  if (client.connect(server, 80)) {

    Serial.println("connected to server");

    WiFi.printDiag(Serial);

    HTTPClient http;    //Declare object of class HTTPClient
   //String data = "id="+(String)id+"&temp="+(String)t+"&lt="+(String)latbuf+"&lg="+(String)lonbuf;
   http.begin("http://techkarigar.com/TempView/views/php/_add-result.php?""id="+(String)id+"&temp="+(String)temp+"&lt="+(String)latbuf+"&lg="+(String)lonbuf);      //Specify request destination
   http.addHeader("Content-Type", "application/x-www-form-urlencoded");  //Specify content-type header
   http.writeToStream(&Serial);
   int httpCode = http.POST("data send");   //Send the request
   String payload = http.getString();                  //Get the response payload
 
   Serial.println(httpCode);   //Print HTTP return code
   Serial.println(payload);    //Print request response payload
 
   http.end();  //Close connection
 
 }else{
 
    Serial.println("Error in WiFi connection");   
 
 }
 
  delay(10000);  //Send a request every 30 seconds
 
}
