<?php

function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
    }

    return $rows;
}

function create_pengguna($post)
{
    global $conn;

    $username = $post['username_pengguna'];
    $alamat = $post['alamat_pengguna'];
    $email = $post['email_pengguna'];
    $password = $post['password_pengguna'];

    $query = "INSERT INTO pengguna VALUES(null, '$username', '$alamat', '$email', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_pengguna($post)
{
    global $conn;

    $id = $post['id_pengguna'];
    $username = $post['username_pengguna'];
    $alamat = $post['alamat_pengguna'];
    $email = $post['email_pengguna'];
    $password = $post['password_pengguna'];

    $query = "UPDATE pengguna SET username_pengguna = '$username', alamat_pengguna = '$alamat', email_pengguna= '$email', password_pengguna = '$password' WHERE id_pengguna = $id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_pengguna($id)
{
    global $conn;

    $query = "DELETE FROM pengguna WHERE id_pengguna = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
