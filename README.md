# Ejemplo de API y Websockets

Configurar mosquitto con websckets: se debe agregar esto al archivo

    /etc/mosquitto/mosquitto.conf

```
port 1883
listener 9001
protocol websockets

```

Además se debe instalar el paquete de node vue-mqtt
