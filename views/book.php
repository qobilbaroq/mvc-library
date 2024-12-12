<?php
$number = 1;        
if (!defined('SECURE_ACCESS')){
    die('Direct access not permitted');
} 
include('templates/header.php') ?>

<div class="main-content bg-white">
    <section class="container my-5">

        <h3 class="panel-title text-center my-5">Search Book @ PI SCHOOL LIBRARY</h3>
        <form action="" class="d-flex justify-content-between align-items-center">
            <input 
                type="text" 
                class="form-control" 
                placeholder="Cari Buku" 
                name="search"
                method="$_POST"
                required/>
            <button class="btn btn-sm btn-primary mx-3">Search</button>
        </form>
        
        <div class="container mt-5 table table-responsive">
            <table class="table">
                <thead>
                    <tr >
                        <td>no</td>
                        <td>title</td>
                        <td>aothor</td>
                        <td>year</td>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php foreach($data as $book) : ?>
                        <tr >
                            <td><?= $number++ ?></td>
                        <td><?= $book->getTitle() ?></td>
                        <td><?= $book->getAuthor() ?></td>
                        <td><?= $book->getYear() ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-center">
            <div class="my-4 border p-2">
                <a href="/">Back to Home</a>
            </div>
        </div>
        
        <div class="footer">
            <p>Copyright© <script>
                document.write(new Date().getFullYear())
                </script> All Rights Reserved By <span class="text-primary">PI SCHOOL LIBRARY</span></p>
    </div>
</section>
</div>

<?php include('templates/footer.php') ?>