<main>

    <h2>Laisser un commentaire</h2>

    <form method="POST">

        <div>
            <label>Donner votre avis :
                <textarea name="comment"> </textarea>
            </label>
        </div>

        <div>
            <button type="submit">Submit le commentaire</button>
        </div>

        <p><?php echo $message; ?></p>

    </form>

    <!-- vérifie que la variable $error existe et non null -->
    <?php if (!empty($error)) { ?>
        <div>
            <p><?php echo $error; ?></p>
        </div>
    <?php } ?>

    <?php require_once('../view/partials/_resume-reservation-view.php') ?>
</main>

</body>

</html>