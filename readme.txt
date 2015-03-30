e-tour Commercial Version version 1.2.1

e-tour es una aplicaci�n web sencilla enfocada a facilitar las reservas y cotizaciones de servicios
 tur�sticos en el sector de las micro,peque�as y medianas empresas de turismo. Los datos manipulados
 pueden ser usados para sus otros sistemas de informaci�n manualmente.

Septiembre 2010
========================================
El manual entero esta en el folder de instalaci�n:  includes/manual.doc.pdf


-Requerimientos antes de instalar el sistema de cotizaciones y reserva de servicios

REQUERIMIENTOS BASICOS
===================================
Servidor
- servidor web con PHP 5 y Mysql 4.11(soporta otras bases de datos editando "config.php"), PHP configurado para enviar correos electr�nicos de preferencia
 usando la funci�n mail()
- Cuentas SMTP, POP3 del servidor en el que se instale
- 10 Megabytes de espacio libre.
- Una base de datos Mysql vacia con usuario y password creada previamente.
Cliente
- Navegador de Internet como Firefox 3,IE8 con soporte de cookies, javascript y AJAX.


 INSTALACION:
  ===============

 1.- Copie los archivos al servidor web, de preferencia mediante FTP(si no suelen ocurrir errores en la
 transferencia de archivos binarios), luego ejecutar install.php,
 
 2.- Llenar los campos del formulario en especial de la base de datos previamente creada desde su panel
 de control como Cpanel, Plesk, etc.           database, host,username, password
 
 3.-  A�adir un administrador en la etapa final con su respectivo password,eso es todo. podr� ingresar al 
sistema como administrador.


Posibles errores:

a)	 Si falla la creaci�n de las tablas ejecute PHPMyadmin o equivalente y vuelque dump.sql a su
	 base de datos seleccionada.En este caso deber� ingresar al sistema con:

	usuario:admin
	password:admindemo  cambie el password tan pronto como sea posible o cree un nuevo usuario borrando a este primero.

b) 	Si falla grabarse la configuraci�n en el archivo "configuration.php" verifique que este 
	archivo tenga permisos de escritura por todos.


IMPORTANTE
=========
1-Verifique previamente si los correos pueden ser enviados desde el PHP, de haber dudas consulte con su
 proveedor de hosting.
2- Todo usuario debe pertenecer a una agencia inclusive el administrador, si este crea cotizaciones estas apareceran incorrectamente. 
Este usuario solo debe usarse para fines administrativos.
2- No est� permitido remover los cr�ditos a cromosoft.com excepto si efectua un pago adicional.

USANDO EL SISTEMA DE COTIZACIONES Y RESERVAS
========================

	CODIGO DE RESERVA
	=================
	Cada reserva tiene un codigo alfanum�rico incremental compuesto de la sigla de la agencia solicitante
 	ejemplos, tenemos la agencia Fantasia SRL, a la que le asignamos el c�digo FANT durante su creaci�n, una reserva creada por ellos ser�:
    	FANT-23456,FANT-23457,etc.

	CREANDO UNA RESERVA O COTIZACION
	===============================

	Luego de ingresar con el usuario y password creado durante la instalaci�n o con otro usuario creado
        y habilitado,desde la ventana principal seleccione el Cat�logo: Tarifario Econ�mico,la p�gina cargar� una
       lista de Servicios en las listas men�, seleccione un servicio ejemplo:
	-(con el c�digo CHA)  Ascenso al Chachani
	-Seleccione una fecha y hora para el servicio
	-Ingrese un n�mero de pasajeros ponga 3
	-En tipo seleccione Privado (es un grupo privado, provenientes de una empresa)
	-Seleccionamos un idioma, habilitamos el CheckBox respectivo y fin�lmente damos clic en "Calcula"

	Nos aparecer� a la derecha el costo del servicio seleccionado, podemos seleccionar para un solo presupuesto
	 o reserva hasta 50 servicios.
	Obtenido el costo podemos ir al menu principal de Cotizaciones donde insertaremos nuevamente el n�mero de 
	nuestros pasajeros, el pais de origen	 y un correo electr�nico donde se enviar� la cotizaci�n, finalmente
	 damos click en enviar.

	Para reservar los servicios procedemos dando click en Reserva, ingresamos los datos y al enviar la reserva
	 recibir� posteriormente el visto bueno de la Empresa, en este caso usted mismo. Una copia de su Reserva
	 sin verificar sera enviada al correo del usuario actualmente usando el sistema.

	 Dir�gase a Reportes, Seleccione "Cotizaciones" (son solo de lectura) o "Reservas", en reservas el estado
	 de la reserva estar� en Recibido, puede cambiar el estado  a Aceptado a Confirmado, el que gener� la
	 reserva recibir� un correo electr�nico con la informaci�n que acaba de actualizar.El interesado deber� efectuar los pagos
	por los m�dios que ud requiera.En breve se a�adir� soporte de pago en l�nea mediante Paypal.


	Existen m�s funciones que est�n en desarrollo, sientase libre de expresar sus opiniones y requerimientos
	 en www.cromosoft.com

	Importante: E-Tour parte del supuesto que la disponibilidad de servicios tur�sticos es ilimitada y usted da el visto bueno.


CREANDO SERVICIOS PARA RESERVAR
=============================
	Luego de ingresar con el usuario y password creado durante la instalaci�n, vaya al Panel de Control, verifique
	 que existen enlaces para manejar 6 elementos 
	fundamentales:

	Agencias, Usuarios, Categorias de Servicios, Servicios, modalidades de Servicios(variaciones de un servicio)  y  Tarifas.

	Proceda en el Siguiente orden dentro del "Panel de Control":

	1.-Debe crear "Empresas de Turismo o Agencias", llene direcci�n, tel�fono, etc.
	2.-luego crear "Usuarios", al crear usuarios seleccionele una "Agencia" a cada usuario.

	3.- Los servicios a ser presupuestados para las reservas deben pertenecer a una "Categoria", cree una "Categoria"
	 y luego cree un "Servicio" que	 pertenesca a esa categoria creada.
	4.- Cree modalidades de servicio, o deje las dos que existen Compartido o Privado. Una modalidad de servicio est� vinculada
	 a un conjunto de idiomas de guiado, a�ada los idiomas de guiado que requiera desde el panel de control, y al crear la modalidad 
	de servicio seleccione los idiomas que se aplican. Ejemplo el servicio compartido puede soportar menos idiomas que el servicio Privado.

	4.-  Creado un "Cat�logo" con un "Servicio", dentro del "Panel de Control" Cree una "Tarifa"

Para Crear una Tarifa seleccione del "Cat�logo" el "Servicio" de Inter�s,el tipo de servicio Compartido o Privado o el que fuere y si
 debe mostrarse solo a una agencia seleccionela a  esta.Las tarifas se crean por intervalos de n�mero de pasajeros, ejemplo si
	 la hora de un guia cuesta $30 ser� asumido por un viajero, si son dos cada uno pagar� $15, si son
	 tres, $10 cada uno. Pax =N�mero de Pasajeros

	 Pax	Precio
	1	30
	2	15
	3	10
	4	10
	Si son 4 o m�s podemos igual considerar $10 por cada uno


	escribiendolo de otra forma tenemos:

	N pasajeros: 	PaxMin PaxMax		MaxPaxMin PaxMax	PaxMin PaxMax		PaxMin PaxMax
			1-    1	 		2       -  2		3    -  3		4  -    10
	Precio		  30			   15			  10			   7


	Estamos diciendo si son entre 4 y 10 pasajeros el precio ser� $7
	
	 Entonces en el Asistente de Tarifas del software hacemos lo siguiente:

	Seleccionamos un cat�logo, Se desplegan los Servicios, seleccionamos un Servicio para el que crearemos precios,
	 en "intervalos de precio" escribimos 4	damos Submit, aparecer�n 4 intervalos,En la primera file escribimos los numeros
 	de pasajeros y en la segunda llenamos los precios para cada intervalo.

	PaxMin PaxMax					
			1  1	 		2  2			3  3			4  10
	Precio		30			15			10			7

	Como observamos tenemos 12 campos para insertar precios y n�mero de pasajeros.
	

	Para el primer intervalo en "m�nimo n�mero de pasajeros" coincide con el "m�ximo n�mero de pasajeros"(PaxMax), esto es un pasajero,
        en Precio ponemos 30, 	en la siguiente columna  15, asi sucesivamente. En este ejemplo
	 estamos estableciendo una relaci�n proporcional, esto en la pr�ctica no tiene	 que ser asi. El usar precios por �ntervalos de pasajeros nos 
	 ahorra escribir muchas tarifas separadas.

	Importante:
	El asistente para crear tarifas(crea servicio, tarifa en tres pasos), solo debe usarse para crear un servicio que no existe, para las
	 ocasiones que necesite crear tarifas para 	otras modalidades de servicio seleccione el "�cono Crear Tarifa".
 

 Insertados agencias, usuarios, Cat�logos servicios y tarifas podemos usarlos en producci�n previas pruebas.

========================

Septiembre 2010 Cromosoft Technologies. cromosoft.com
