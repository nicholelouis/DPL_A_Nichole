# Instalando LDAP

## Configuración de red
- modificamos el netplan `sudo nano /etc/netplan/00-installer-config.yaml`:

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/4d9f0a87197c1bd07ae400ddb541dc04160328c1/LDAP/img/dpl2.png)

se aplica con `sudo netplan apply`

## Instalación LDAP en servidor
- Cambiamos el hostname del servidor `sudo hostnamectl set-hostname ldapserver.nikki.local`
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
dn: ou=informatica,dc=nikki,dc=local
objectClass: top
objectClass: organizationalUnit
ou: informatica
```

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl5.png)

- Hacemos `sudo ldapadd -x -D cn=admin,dc=nikki,dc=local -W -f ou.ldif`

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl6.png)

- Comprobamos con `sudo slapcat`

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl7.png)

## Crear grupos
- Copiamos el fichero `cp ou.ldif grp.ldif`
- Modificamos `sudo nano grp.ldif`:
```
dn: cn=informatica,ou=informatica,dc=nikki,dc=local
objectClass: top
objectClass: posixGroup
gidNumber: 10000
cn: informatica
```

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl8.png)

- Creamos grupos con `sudo ldapadd -x -D cn=admin,dc=nikki,dc=local -W -f grp.ldif`
- Comprobamos con `sudo slapcat`

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl9.png)

## Crear usuario
- Copiamos `cp grp.ldif usr.ldif`
- `sudo nano usr.ldif`:
```
dn: uid=informatica,ou=informatica,dc=nikki,dc=local
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
mail: nikki@example.es
givenName: isauwunter
```

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl10.png)

- Creamos usuario `sudo ldapadd -x -D cn=admin,dc=nikki,dc=local -W -f usr.ldif`
- Comprobamos con `sudo slapcat`

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl11.png)

## Instalación LDAP en cliente
- Instalamos con `sudo apt-get install libnss-ldap libpam-ldap ldap-utils -y`
  - Quitamos un slash y la i, ponemos la direccion del servidor

  ![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl12.png)

  - Cambiamos para que los parametros coincidan

  ![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl13.png)

  - Version 3, TAB enter

  - Si

  - No

  - Cambiamos los parámetros para que coincidan
  - Contraseña
- Si nos equivocamos habra que hacer `sudo dpkg-reconfigure ldap-auth-config`
- Cambiamos `sudo nano /etc/nsswitch.conf` cambiamos en `passwd`, `group` y `shadow` por ldap despues de files.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl14.png)

- Comprobamos `sudo getent passwd`

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl15.png)

- Modificamos `sudo nano /etc/pam.d/common-session`: Añadimos una nueva linea `session optional` con `pam_mkhomedir.so skel=/etc/skel umask=077`

- ldapsearch -x -H ldap://192.168.1.8 -b "dc=nikki,dc=local"

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl16.png)

- `sudo su - nikki`

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl17.png)

## Configuración cliente sesión gráfica
- Nueva terminal
- `sudo apt install nslcd`
  - Comprobar que esté bien

  ![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/ece8abd4238cf97d2c9bc53c1a5e61bbdae4290b/LDAP/img/dpl19.png)
  
- sudo reboot