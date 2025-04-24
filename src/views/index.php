<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        Home page
        <hr />
        
        <div>
            <?php if (!empty($invoice)): ?>
                Invoice ID: <?= htmlspecialchars($invoice['id'], ENT_QUOTES) ?> <br />
                Invoice amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br />
                User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?> <br />
            <?php endif ?>
        </div>
    </body>
</html>