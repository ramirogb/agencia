e-tour Commercial Version version 1.2.1

e-tour es una aplicación web sencilla enfocada a facilitar las reservas y cotizaciones de servicios
 turísticos en el sector de las micro,pequeñas y medianas empresas de turismo. Los datos manipulados
 pueden ser usados para sus otros sistemas de información manualmente.

Septiembre 2010
========================================
El manual entero esta en el folder de instalación:  includes/manual.doc.pdf


-Requerimientos antes de instalar el sistema de cotizaciones y reserva de servicios

REQUERIMIENTOS BASICOS
===================================
Servidor
- servidor web con PHP 5 y Mysql 4.11(soporta otras bases de datos editando "config.php"), PHP configurado para enviar correos electrónicos de preferencia
 usando la función mail()
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
 
 3.-  Añadir un administrador en la etapa final con su respectivo password,eso es todo. podrá ingresar al 
sistema como administrador.


Posibles errores:

a)	 Si falla la creación de las tablas ejecute PHPMyadmin o equivalente y vuelque dump.sql a su
	 base de datos seleccionada.En este caso deberá ingresar al sistema con:

	usuario:admin
	password:admindemo  cambie el password tan pronto como sea posible o cree un nuevo usuario borrando a este primero.

b) 	Si falla grabarse la configuración en el archivo "configuration.php" verifique que este 
	archivo tenga permisos de escritura por todos.


IMPORTANTE
=========
1-Verifique previamente si los correos pueden ser enviados desde el PHP, de haber dudas consulte con su
 proveedor de hosting.
2- Todo usuario debe pertenecer a una agencia inclusive el administrador, si este crea cotizaciones estas apareceran incorrectamente. 
Este usuario solo debe usarse para fines administrativos.
2- No está permitido remover los créditos a cromosoft.com excepto si efectua un pago adicional.

USANDO EL SISTEMA DE COTIZACIONES Y RESERVAS
========================

	CODIGO DE RESERVA
	=================
	Cada reserva tiene un codigo alfanumérico incremental compuesto de la sigla de la agencia solicitante
 	ejemplos, tenemos la agencia Fantasia SRL, a la que le asignamos el código FANT durante su creación, una reserva creada por ellos será:
    	FANT-23456,FANT-23457,etc.

	CREANDO UNA RESERVA O COTIZACION
	===============================

	Luego de ingresar con el usuario y password creado durante la instalación o con otro usuario creado
        y habilitado,desde la ventana principal seleccione el Catálogo: Tarifario Económico,la página cargará una
       lista de Servicios en las listas menú, seleccione un servicio ejemplo:
	-(con el código CHA)  Ascenso al Chachani
	-Seleccione una fecha y hora para el servicio
	-Ingrese un número de pasajeros ponga 3
	-En tipo seleccione Privado (es un grupo privado, provenientes de una empresa)
	-Seleccionamos un idioma, habilitamos el CheckBox respectivo y finálmente damos clic en "Calcula"

	Nos aparecerá a la derecha el costo del servicio seleccionado, podemos seleccionar para un solo presupuesto
	 o reserva hasta 50 servicios.
	Obtenido el costo podemos ir al menu principal de Cotizaciones donde insertaremos nuevamente el número de 
	nuestros pasajeros, el pais de origen	 y un correo electrónico donde se enviará la cotización, finalmente
	 damos click en enviar.

	Para reservar los servicios procedemos dando click en Reserva, ingresamos los datos y al enviar la reserva
	 recibirá posteriormente el visto bueno de la Empresa, en este caso usted mismo. Una copia de su Reserva
	 sin verificar sera enviada al correo del usuario actualmente usando el sistema.

	 Dirígase a Reportes, Seleccione "Cotizaciones" (son solo de lectura) o "Reservas", en reservas el estado
	 de la reserva estará en Recibido, puede cambiar el estado  a Aceptado a Confirmado, el que generó la
	 reserva recibirá un correo electrónico con la información que acaba de actualizar.El interesado deberá efectuar los pagos
	por los médios que ud requiera.En breve se añadirá soporte de pago en línea mediante Paypal.


	Existen más funciones que están en desarrollo, sientase libre de expresar sus opiniones y requerimientos
	 en www.cromosoft.com

	Importante: E-Tour parte del supuesto que la disponibilidad de servicios turísticos es ilimitada y usted da el visto bueno.


CREANDO SERVICIOS PARA RESERVAR
=============================
	Luego de ingresar con el usuario y password creado durante la instalación, vaya al Panel de Control, verifique
	 que existen enlaces para manejar 6 elementos 
	fundamentales:

	Agencias, Usuarios, Categorias de Servicios, Servicios, modalidades de Servicios(variaciones de un servicio)  y  Tarifas.

	Proceda en el Siguiente orden dentro del "Panel de Control":

	1.-Debe crear "Empresas de Turismo o Agencias", llene dirección, teléfono, etc.
	2.-luego crear "Usuarios", al crear usuarios seleccionele una "Agencia" a cada usuario.

	3.- Los servicios a ser presupuestados para las reservas deben pertenecer a una "Categoria", cree una "Categoria"
	 y luego cree un "Servicio" que	 pertenesca a esa categoria creada.
	4.- Cree modalidades de servicio, o deje las dos que existen Compartido o Privado. Una modalidad de servicio está vinculada
	 a un conjunto de idiomas de guiado, añada los idiomas de guiado que requiera desde el panel de control, y al crear la modalidad 
	de servicio seleccione los idiomas que se aplican. Ejemplo el servicio compartido puede soportar menos idiomas que el servicio Privado.

	4.-  Creado un "Catálogo" con un "Servicio", dentro del "Panel de Control" Cree una "Tarifa"

Para Crear una Tarifa seleccione del "Catálogo" el "Servicio" de Interés,el tipo de servicio Compartido o Privado o el que fuere y si
 debe mostrarse solo a una agencia seleccionela a  esta.Las tarifas se crean por intervalos de número de pasajeros, ejemplo si
	 la hora de un guia cuesta $30 será asumido por un viajero, si son dos cada uno pagará $15, si son
	 tres, $10 cada uno. Pax =Número de Pasajeros

	 Pax	Precio
	1	30
	2	15
	3	10
	4	10
	Si son 4 o más podemos igual considerar $10 por cada uno


	escribiendolo de otra forma tenemos:

	N pasajeros: 	PaxMin PaxMax		MaxPaxMin PaxMax	PaxMin PaxMax		PaxMin PaxMax
			1-    1	 		2       -  2		3    -  3		4  -    10
	Precio		  30			   15			  10			   7


	Estamos diciendo si son entre 4 y 10 pasajeros el precio será $7
	
	 Entonces en el Asistente de Tarifas del software hacemos lo siguiente:

	Seleccionamos un catálogo, Se desplegan los Servicios, seleccionamos un Servicio para el que crearemos precios,
	 en "intervalos de precio" escribimos 4	damos Submit, aparecerán 4 intervalos,En la primera file escribimos los numeros
 	de pasajeros y en la segunda llenamos los precios para cada intervalo.

	PaxMin PaxMax					
			1  1	 		2  2			3  3			4  10
	Precio		30			15			10			7

	Como observamos tenemos 12 campos para insertar precios y número de pasajeros.
	

	Para el primer intervalo en "mínimo número de pasajeros" coincide con el "máximo número de pasajeros"(PaxMax), esto es un pasajero,
        en Precio ponemos 30, 	en la siguiente columna  15, asi sucesivamente. En este ejemplo
	 estamos estableciendo una relación proporcional, esto en la práctica no tiene	 que ser asi. El usar precios por íntervalos de pasajeros nos 
	 ahorra escribir muchas tarifas separadas.

	Importante:
	El asistente para crear tarifas(crea servicio, tarifa en tres pasos), solo debe usarse para crear un servicio que no existe, para las
	 ocasiones que necesite crear tarifas para 	otras modalidades de servicio seleccione el "ícono Crear Tarifa".
 

 Insertados agencias, usuarios, Catálogos servicios y tarifas podemos usarlos en producción previas pruebas.

========================

Septiembre 2010 Cromosoft Technologies. cromosoft.com
