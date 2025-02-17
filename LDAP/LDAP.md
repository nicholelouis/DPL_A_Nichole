# Instalando LDAP

## Configuración de red
- modificamos el netplan `sudo nano /etc/netplan/00-installer-config.yaml`:

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/4d9f0a87197c1bd07ae400ddb541dc04160328c1/LDAP/img/dpl2.png)

se aplica con `sudo netplan apply`

## Instalación LDAP en servidor
- Cambiamos el hostname del servidor `sudo hostnamectl set-hostname ldapserver.isauwuntu.local`
- Cambiamos el fichero `sudo nano /etc/hosts`:
```
# Añadimos nuestra ip y direccion
192.168.1.8 ldapserver.nikki.local
```

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/4d9f0a87197c1bd07ae400ddb541dc04160328c1/LDAP/img/dpl.png)

- Actualizamos repositorios `sudo apt update` y `sudo apt upgrade`
- En la máquina servidor `sudo apt install slapd ldap-utils -y`
  - Introducimos la contraseña cuando la pida
- Continuamos con `sudo dpkg-reconfigure slapd
  - Indicamos No al mensaje
  - Introducimos el nombre del DNS
  - Cambiamos el nombre de la organización
  - Confirmamos la contraseña
  - Marcar Si al borrado de BBDD
  - Marcar Si al mover la BBDD
  - Volver a intentar la configuración, SI (Solo saldrá si fallamos al poner la contraseña)

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/4d9f0a87197c1bd07ae400ddb541dc04160328c1/LDAP/img/dpl3.png)

- Hacemos `sudo slapcat` para ver que todo funcione

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/4d9f0a87197c1bd07ae400ddb541dc04160328c1/LDAP/img/dpl4.png)

## Unidad organizativa
- Vamos a `sudo nano ou.ldif`:
```
dn: ou=informatica,dc=isauwuntu,dc=local
objectClass: top
objectClass: organizationalUnit
ou: informatica
```
- Hacemos `sudo ldapadd -x -D cn=admin,dc=isauwuntu,dc=local -W -f ou.ldif`
- Comprobamos con `sudo slapcat`

## Crear grupos
- Copiamos el fichero `cp ou.ldif grp.ldif`
- Modificamos `sudo nano grp.ldif`:
```
dn: cn=informatica,ou=informatica,dc=isauwuntu,dc=local
objectClass: top
objectClass: posixGroup
gidNumber: 10000
cn: informatica
```
- Creamos grupos con `sudo ldapadd -x -D cn=admin,dc=isauwuntu,dc=local -W -f grp.ldif`
- Comprobamos con `sudo slapcat`

## Crear usuario
- Copiamos `cp grp.ldif usr.ldif`
- `sudo nano usr.ldif`:
```
dn: uid=informatica,ou=informatica,dc=isauwuntu,dc=local
objectClass: top
objectClass: posixAccount
objectClass: inetOrgPerson
objectClass: person
cn: isauwunter
uid: isauwunter
ou: informatica
uidNumber: 2000
gidNumber: 10000
homeDirectory: /home/isaiasuwuntu
loginShell: /bin/bash
userPassword: 1234
sn: Worker
mail: isauwuntu@example.es
givenName: isauwunter
```
- Creamos usuario `sudo ldapadd -x -D cn=admin,dc=isauwuntu,dc=local -W -f usr.ldif`
- Comprobamos con `sudo slapcat`

## Instalación LDAP en cliente
- Instalamos con `sudo apt-get install libnss-ldap libpam-ldap ldap-utils -y`
  - Quitamos un slash y la i, ponemos la direccion del servidor
  - Cambiamos para que los parametros coincidan
  - Version 3, TAB enter
  - Si
  - No
  - Cambiamos los parámetros para que coincidan
  - Contraseña
- Si nos equivocamos habra que hacer `sudo dpkg-reconfigure ldap-auth-config`
- Cambiamos `sudo nano /etc/nsswitch.conf` cambiamos en `passwd`, `group` y `shadow` por ldap despues de files.
- Comprobamos `sudo getent passwd`
- Modificamos `sudo nano /etc/pam.d/common-session`: Añadimos una nueva linea `session optional` con `pam_mkhomedir.so skel=/etc/skel umask=077`
- ldapsearch -x -H ldap://192.168.1.8 -b "dc=isauwuntu,dc=local"

- `sudo su - isauwunter`
## Configuración cliente sesión gráfica
- Nueva terminal
- `sudo apt install nslcd`
  - Comprobar que esté bien
- sudo reboot