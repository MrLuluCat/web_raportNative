<?php

require '../../view.php';
require_once('../../koneksi.php');


$query = "SELECT * FROM kelas";
$result = mysqli_query($conn, $query);
// Define sections
View::section('title', 'SMPIT Auliya');
View::section('css', '../../');
View::section('nav', '../');
// View::section('header', 'This is the header of the Home page');

$content = '<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Kelas</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="my-3 p-3 bg-body rounded shadow-sm">

                    <div class="pb-3">
                        <a href="create.php" class="btn btn-success">+ Tambah Kelas</a>
                    </div>

                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-1">Tingkat Kelas</th>
                                <th class="col-md-3">Nama Kelas</th>
                                <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            $content .= '<tr>
                                    <td>' . $row["id_kelas"] . '</td>
                                    <td>' . $row["tingkat_kelas"] . '</td>
                                    <td>' . $row["nama_kelas"] . '</td>
                                    <td><a href="edit.php?id_kelas=' . $row['id_kelas'] . '" class="btn btn-warning btn-sm ">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm ">Delete</a>
                                    </td>
                                </tr>';
                            }
                        $content .= '</tbody>
                    </table>
                </div>
            </section>
        </div>';

View::section('content', $content);
// Render the home view
View::extend('views/layout.php');
