<?php
// resume.php — Layout clean com duas colunas e timeline — v4
function h($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
$nome = h($_POST['nome'] ?? '');
$nasc = $_POST['nascimento'] ?? '';
$idade = $_POST['idade'] ?? '';
if(!$idade && $nasc){
  try {
    $d1 = new DateTime($nasc); $d2 = new DateTime('now');
    $idade = $d1->diff($d2)->y;
  } catch(Exception $e) { $idade = ''; }
}
$email = h($_POST['email'] ?? '');
$tel = h($_POST['telefone'] ?? '');
$end = h($_POST['endereco'] ?? '');
$resumo = nl2br(h($_POST['resumo'] ?? ''));
$skills = array_filter(array_map('trim', explode(',', $_POST['skills'] ?? '')));

$educ = $_POST['educ'] ?? [];
$exp  = $_POST['exp'] ?? [];
$refe = $_POST['ref'] ?? [];
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Currículo • <?php echo $nome ? $nome : 'Gerado'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="theme-soft">
<div class="no-print container my-3 d-flex justify-content-between align-items-center">
  <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Editar</a>
  <button class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer"></i> Imprimir / Salvar PDF</button>
</div>

<main class="container resume-sheet resume-pro">
  <div class="row g-0">
    <aside class="col-12 col-lg-4 sidebar p-4">
      <div class="avatar mb-3">
        <div class="avatar-circle"><?php echo strtoupper(substr($nome ?: 'CV', 0, 1)); ?></div>
      </div>
      <h1 class="h4 mb-3"><?php echo $nome; ?></h1>
      <ul class="list-unstyled text-muted small mb-4 contact-list">
        <?php if($idade): ?><li><i class="bi bi-cake"></i> <?php echo $idade; ?> anos</li><?php endif; ?>
        <?php if($email): ?><li><i class="bi bi-envelope"></i> <?php echo $email; ?></li><?php endif; ?>
        <?php if($tel): ?><li><i class="bi bi-telephone"></i> <?php echo $tel; ?></li><?php endif; ?>
        <?php if($end): ?><li><i class="bi bi-geo-alt"></i> <?php echo $end; ?></li><?php endif; ?>
      </ul>

      <?php if($skills): ?>
      <h2 class="h6 text-uppercase fw-bold text-muted mb-2">Habilidades</h2>
      <ul class="skills-list mb-4">
        <?php foreach($skills as $s): ?><li><?php echo h($s); ?></li><?php endforeach; ?>
      </ul>
      <?php endif; ?>

      <?php if(!empty($educ)): ?>
      <h2 class="h6 text-uppercase fw-bold text-muted mb-2">Formação</h2>
      <div class="edu-list">
        <?php foreach($educ as $e): ?>
          <?php $curso=h($e['curso']??''); $inst=h($e['inst']??''); $ano=h($e['ano']??''); ?>
          <div class="edu-item">
            <div class="fw-semibold"><?php echo $curso; ?></div>
            <div class="text-muted small"><?php echo $inst; ?> <?php echo $ano?'• '.$ano:''; ?></div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </aside>

    <section class="col-12 col-lg-8 p-4 p-lg-5">
      <?php if($resumo): ?>
      <section class="mb-4">
        <h2 class="section-title">Resumo</h2>
        <p class="lead text-secondary"><?php echo $resumo; ?></p>
      </section>
      <?php endif; ?>

      <?php if(!empty($exp)): ?>
      <section class="mb-4">
        <h2 class="section-title">Experiência</h2>
        <div class="timeline">
          <?php foreach($exp as $e): ?>
            <?php
              $cargo = h($e['cargo'] ?? '');
              $empresa = h($e['empresa'] ?? '');
              $inicio = h($e['inicio'] ?? '');
              $fim = h($e['fim'] ?? '');
              $desc = nl2br(h($e['desc'] ?? ''));
            ?>
            <div class="tl-item">
              <div class="tl-dot"></div>
              <div class="tl-content">
                <div class="d-flex justify-content-between flex-wrap gap-2">
                  <div class="fw-semibold"><?php echo $cargo; ?><?php echo $empresa ? ' • '.$empresa : ''; ?></div>
                  <div class="text-muted small"><?php echo $inicio; ?><?php echo ($inicio||$fim) ? ' — ' : ''; ?><?php echo $fim ?: 'Atual'; ?></div>
                </div>
                <?php if($desc): ?><div class="text-body-secondary small mt-1"><?php echo $desc; ?></div><?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php if(!empty($refe)): ?>
      <section class="mb-0">
        <h2 class="section-title">Referências</h2>
        <ul class="mb-0">
          <?php foreach($refe as $r): ?>
            <?php $n = h($r['nome'] ?? ''); $c = h($r['contato'] ?? ''); ?>
            <li><?php echo $n; ?><?php echo $c ? ' — '.$c : ''; ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
      <?php endif; ?>
    </section>
  </div>
</main>

</body>
</html>
