<p align="center"><a href="https://github.com/saddamsevena/SatuDataPadjadjaran/" target="_blank"><img src="https://i.ibb.co/QvcVDPS/sdp.png" width="400"></a></p>

<p align="center">

</p>

## About SatuDataPadjadjaran

Satu Data Padjadjaran (SDP) merupakan sebuah platform berbasis website yang berisi integrasi data. Data yang diintegrasikan adalah data yang dihimpun dari Kema Unpad dalam berbagai sektor.  Selain itu, Kema Unpad juga dapat mengajukan entri data yang dirasa penting agar dapat dipublikasikan di SDP. Satu Data Padjadjaran dikelola oleh pengurus Biro Riset Data dan Analisis BEM Kema Unpad dalam mewujudkan visi BEM Kema Unpad yaitu Data Driven Policy. 

### Built With

* [Laravel 9.x](https://laravel.com/)
* [Bootstrap 5.3](https://getbootstrap.com/)

## Requirements

<ul>
    <li>Git</li>
    <li>Composer</li>
    <li>XAMPP</li>
    <li>PHP 8+</li>
    <li>Browser</li>
</ul>

## Installation

1. Clone Project
    ```sh 
        git clone https://github.com/saddamsevena/SatuDataPadjadjaran/
    ```
2. Install Composer on Project Directories
    ```sh 
        composer install
    ```
3. Set up the .env file
    ```
        Change Database (DB_DATABASE) name to your local database in XAMPP
    ```
4. Run php artisan key:generate on terminal
    ```sh 
        php artisan key:generate
    ```
5. Run php artisan migrate on terminal
    ```sh 
        php artisan migrate
    ```
6. Run php artisan serve on terminal
    ```sh 
        php artisan serve
    ```
> ### Satu Data Padjadjaran is now online [Here](https://satudatapadjadjaran.site/)

## Credits
> Saddam Habibi Utomo <br>
> 140810190017 <br>
> Universitas Padjadjaran

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).