<main>

    <h2>Payer une réservation</h2>

    <?php require_once ('../view/partials/_resume-reservation-view.php') ?>
    
    <form method="POST">

        <div>
            <button type="submit">Payer la réservation</button>
        </div>

    </form>

    <p><?php echo $message; ?></p>

</main>

</body>

</html>