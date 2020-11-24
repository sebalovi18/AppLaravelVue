Para correr la siguiente aplicacion:

1 - Clonar el repositorio o descargarlo en formato comprimido <br>
2 - Tener instalado composer y NodeJs<br>
3 - Desde la terminal ubicarse en la raiz del proyecto y ejecutar composer install y luego npm install<br>
4 - Crear en la raiz del proyecto el archivo .env , podemos usar el archivo .env.example como base<br>
5 - Ejecutar php artisan key:generate<br>
6 - En el archivo .env modificar las siguientes constantes:<br>
                                                            DB_CONNECTION=mysql<br>
                                                            DB_HOST=127.0.0.1<br>
                                                            DB_PORT=3306<br>
                                                            DB_DATABASE=laravel<br>
                                                            DB_USERNAME=root<br>
                                                            DB_PASSWORD=    <br>
7 - En el paso anterior le decimos a laravel que nuestra base de datos esta en mysql , como conectarnos y que la misma se llama laravel , que para acceder usamos los valores de username y password<br>

8 - Crear una base de datos en mysql con el nombre (en este caso a modo de ejemplo) laravel<br>
9 - En la terminal correr php artisan migrate:fresh --seed para crear las tablas que usaremos y cargar en las mismas datos aleatorios<br>
10 - En la terminal ejecutar npm run dev para generar el script que utilizara como front nuestra app<br>

//Notas<br>

Noticias<br>
--------
La seccion noticias no funciona ya que se consume una Api la cual necesita una key. Para que funcione necesita crearse una cuenta en https://newsapi.org/ , una vez que obtengas la key crear una constante en el archivo .env que se llame en este caso NEWS_API_KEY<br>

Contacto<br>
--------
La seccion contacto tampoco funcionara ya que esta tambien necesita una key , en mi caso use el servidor de correo de google . 
Para que funcione debe configurar en el archivo .env los siguientes parametros:<br>
                                                                                MAIL_MAILER=smtp<br>
                                                                                MAIL_HOST=smtp.gmail.com<br>
                                                                                MAIL_PORT=587<br>
                                                                                MAIL_USERNAME="su correo"<br>
                                                                                MAIL_PASSWORD="key"<br>
                                                                                MAIL_ENCRYPTION=tls<br>
                                                                                MAIL_FROM_ADDRESS=<br>
                                                                                MAIL_FROM_NAME="${APP_NAME}"<br>
