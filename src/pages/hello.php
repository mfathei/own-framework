<!-- now the page converted to template -->

Hello <?= htmlspecialchars(isset($name)? $name: 'World', ENT_QUOTES, 'UTF-8') ?>
