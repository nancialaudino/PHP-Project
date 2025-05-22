<?php 
include 'hobby.php';
session_start();

$formSubmitted = false;
$errors = [];
$name = $surname = $email = $title = $optradio = $message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $title = htmlspecialchars(trim($_POST['title']));
    $optradio = htmlspecialchars(trim($_POST['optradio'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message']));

    $_SESSION['form_data'] = $_POST; // Salvar os dados preenchidos

    // Validações
    if (empty($name)) {
        $errors['name'] = "The 'Name' field is required.";
    }

    if (empty($surname)) {
        $errors['surname'] = "The 'Surname' field is required.";
    }

    if (empty($email)) {
        $errors['email'] = "The 'Email' field is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "The email entered must be in a valid format.";
    }

    if (empty($title)) {
        $errors['title'] = "Select a title.";
    }

    if (strlen($message) < 5) {
        $errors['message'] = "The message must be at least 5 characters long.";
    }

    if (empty($errors)) {
        unset($_SESSION['form_data']);
        $formSubmitted = true;

        // Gravar dados no ficheiro
        $content = "Name: $name\nSurname: $surname\nEmail: $email\nTitle: $title\nReason: $optradio\nMessage: $message\n---\n";
        file_put_contents('contact_data.txt', $content, FILE_APPEND);
    }
}
?>
    
<div class="container">
    <div class="text-center mt-5">
        <h1 id="h1-form">Contact Form</h1>
    </div>

    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <?php if ($formSubmitted): ?>
                            <h4>Merci, <?= $name ?> <?= $surname ?> !</h4>
                        <?php else: ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=contact'; ?>" method="post">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Firstname *</label>
                                            <input id="form_name" type="text" name="name"
                                                class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                                                value="<?= htmlspecialchars($_SESSION['form_data']['name'] ?? '') ?>"
                                                placeholder="Please enter your firstname *">
                                            <?php if (isset($errors['name'])): ?>
                                                <div class="invalid-feedback"><?= $errors['name'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Lastname *</label>
                                            <input id="form_lastname" type="text" name="surname"
                                                class="form-control <?= isset($errors['surname']) ? 'is-invalid' : '' ?>"
                                                value="<?= htmlspecialchars($_SESSION['form_data']['surname'] ?? '') ?>"
                                                placeholder="Please enter your lastname *">
                                            <?php if (isset($errors['surname'])): ?>
                                                <div class="invalid-feedback"><?= $errors['surname'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="form_email" type="email" name="email"
                                                class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                                value="<?= htmlspecialchars($_SESSION['form_data']['email'] ?? '') ?>"
                                                placeholder="Please enter your email *">
                                            <?php if (isset($errors['email'])): ?>
                                                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_title">Title*</label>
                                            <select id="form_title" name="title"
                                                class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>">
                                                <option value="" disabled <?= empty($_SESSION['form_data']['title']) ? 'selected' : '' ?>>--Select Your Title--</option>
                                                <option <?= ($_SESSION['form_data']['title'] ?? '') == 'Mr.' ? 'selected' : '' ?>>Mr.</option>
                                                <option <?= ($_SESSION['form_data']['title'] ?? '') == 'Mrs.' ? 'selected' : '' ?>>Mrs.</option>
                                                <option <?= ($_SESSION['form_data']['title'] ?? '') == 'Miss' ? 'selected' : '' ?>>Miss</option>
                                                <option <?= ($_SESSION['form_data']['title'] ?? '') == 'Ms.' ? 'selected' : '' ?>>Ms.</option>
                                            </select>
                                            <?php if (isset($errors['title'])): ?>
                                                <div class="invalid-feedback d-block"><?= $errors['title'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-2 d-block">Raison du contact *</label>
                                    <?php $selectedOption = $_SESSION['form_data']['optradio'] ?? 'option1'; ?>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" <?= $selectedOption == 'option1' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio1">Work with us</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2" <?= $selectedOption == 'option2' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio2">Suggestions</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3" <?= $selectedOption == 'option3' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio3">Report a problem</label>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Message *</label>
                                            <textarea id="form_message" name="message"
                                                class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                                                rows="4" placeholder="Write your message here."><?= htmlspecialchars($_SESSION['form_data']['message'] ?? '') ?></textarea>
                                            <?php if (isset($errors['message'])): ?>
                                                <div class="invalid-feedback d-block"><?= $errors['message'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <input type="submit" class="btn btn-success btn-send pt-2 btn-block" value="Send Message">
                                </div>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
