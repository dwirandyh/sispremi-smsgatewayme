<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Pelanggan
 *
 * @mixin \Eloquent
 * @property int $idPelanggan
 * @property string $nama
 * @property string $jenisKelamin
 * @property string $namaIbu
 * @property string $tempatLahir
 * @property string $tglLahir
 * @property string $wargaNegara
 * @property string $statusPernikahan
 * @property string $alamat
 * @property string $noTelepon
 * @property string $email
 * @property string $pekerjaan
 * @property string $jabatan
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereIdPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereNamaIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereStatusPernikahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pelanggan whereWargaNegara($value)
 */
	class Pelanggan extends \Eloquent {}
}

namespace App{
/**
 * App\PenerimaSantunan
 *
 * @mixin \Eloquent
 * @property int $idPenerima
 * @property int $idPelanggan
 * @property string $nama
 * @property string $jenisKelamin
 * @property string $tglLahir
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereIdPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereIdPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PenerimaSantunan whereUpdatedAt($value)
 */
	class PenerimaSantunan extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

