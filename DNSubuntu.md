# Instalación DNS Bind9 en Ubuntu

Para la instalación y configuración de un servidor DNS Bind9 en Ubuntu, seguí los siguientes pasos:

1. **Actualización del sistema**
   Primero, aseguré que el sistema estuviera actualizado con:
   ```
   sudo apt update
   sudo apt upgrade
   ```

2. **Instalación de Bind9 y Nano**
   Instalé el paquete Bind9:
   ```
   sudo apt install bind9 bind9-utils 
   ```

3. **Verificación del estado de Bind9**
   Comprobé que el servicio estuviera en funcionamiento:
   ```
   systemctl status bind9
   ```
   Aunque aparecieron errores o advertencias, era normal en este punto.

4. **Configuración del Firewall**
   Permití el acceso al puerto de Bind9 con:
   ```
   sudo ufw allow bind9
   ```
   Se confirmó la actualización de reglas.

5. **Configuración mínima de Bind9**
   Edité el archivo de opciones con:
   ```
   sudo nano /etc/bind/named.conf.options
   ```
   Modifiqué/agregué las siguientes líneas:
   ```
   listen-on { any; };
   allow-query { localhost; 10.10.20.0/24; };
   forwarders {
       8.8.8.8;
       8.8.4.4;
   };
   dnssec-validation no;
   ```

6. **Forzar el uso de IPv4**
   Edité el archivo correspondiente:
   ```
   sudo nano /etc/default/named
   ```
   Dejando la línea:
   ```
   OPTIONS="-u bind -4"
   ```

7. **Verificación y reinicio del servicio**
   Comprobé la configuración y reinicié Bind9:
   ```
   sudo named-checkconf
   sudo systemctl restart bind9
   systemctl status bind9
   ```

8. **Definir las zonas DNS**
   Edité el archivo de configuración de zonas:
   ```
   sudo nano /etc/bind/named.conf.local
   ```
   Agregué las siguientes líneas:
   ```
   zone "networld.cu" IN {
       type master;
       file "/etc/bind/zonas/db.networld.cu";
   };
   zone "20.10.10.in-addr.arpa" {
       type master;
       file "/etc/bind/zonas/db.10.10.20";
   };
   ```

9. **Creación de los archivos de zona**
   Creé el directorio y los archivos necesarios:
   ```
   sudo mkdir /etc/bind/zonas
   sudo nano /etc/bind/zonas/db.networld.cu
   ```
   Contenido del archivo:
   ```
   $TTL 1D
   @ IN SOA ns1.networld.cu. admin.networld.cu. (
       1 ; Serial
       12h ; Refresh
       15m ; Retry
       3w ; Expire
       2h ) ; Negative Cache TTL
   IN NS ns1.networld.cu.
   ns1 IN A 10.10.20.13
   www IN A 10.10.20.13
   ```
   Luego, creé el archivo de zona inversa:
   ```
   sudo nano /etc/bind/zonas/db.10.10.20
   ```
   Contenido del archivo:
   ```
   $TTL 1d
   @ IN SOA ns1.networld.cu admin.networld.cu. (
       20210222 ; Serial
       12h ; Refresh
       15m ; Retry
       3w ; Expire
       2h ) ; Negative Cache TTL
   @ IN NS ns1.networld.cu.
   1 IN PTR www.networld.cu.
   ```

10. **Verificación de los archivos de zona**
    Revisé que los archivos de zona estuvieran correctos:
    ```
    sudo named-checkzone networld.cu /etc/bind/zonas/db.networld.cu
    sudo named-checkzone db.20.10.10.in-addr.arpa /etc/bind/zonas/db.10.10.20
    ```
    Ambas comprobaciones devolvieron "OK".

11. **Reinicio de Bind9**
    Reinicié el servicio nuevamente:
    ```
    sudo systemctl restart bind9
    ```

12. **Prueba desde otra PC**
    Finalmente, verifiqué que el DNS resolviera correctamente:
    ```
    ping www.networld.cu
    ```
    La respuesta confirmó que el servidor DNS estaba funcionando correctamente.

