# Simple Preauth Implementation

Repo ini digunakan untuk contoh implementasi preauth pada layanan satuan kerja

## Installation

### Requirement
Untuk menggunakan repo ini, server anda harus mendukung:
- PHP 5.5.9 or greater
- PHP LDAP Extension
- An LDAP Server

### Installing
- Clone this repo
- Run `composer install` setelah selesai jalankan perintah dibawah ini
```
$ cp config/example.database.php config/database.php
$ cp config/example.ldap.php config/ldap.php
$ cp config/example.preauth.php config/preauth.php
$ cp example.phix.yml phinx.yml
```
- Sesuaikan konfigurasi dengan server anda
- Migrasi database dengan menjalankan `php vendor/bin/phinx migrate`