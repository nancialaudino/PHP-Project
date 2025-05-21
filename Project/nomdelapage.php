<?php 
include 'hobby.php';

$formSubmitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $title = htmlspecialchars(trim($_POST['title']));
    $optradio = htmlspecialchars(trim($_POST['optradio']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    $formSubmitted = true;
}
?>

<div class="container text-center mt-5">
    <h1>Contact Form</h1>
</div>

<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
                <div class="container">
                    <?php if ($formSubmitted): ?>
                        <h4>Merci, <?= $name ?> <?= $surname ?> !</h4>
                    <?php else: ?>
                        <form id="contact-form" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=contact'; ?>" method="post">
                            <!-- todo: o conteúdo do formulário vai aqui (como já está no seu código atual) -->
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
