<?php
// index.php — Formulário (Tema Clean) — v4
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerador de Currículo - APO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="theme-soft">
<header class="hero">
  <div class="container hero-inner">
    <div>
      <h1 class="display-6 fw-bold mb-1">APO • Gerador de Currículo</h1>
      <p class="mb-0 text-hero">Crie um currículo limpo e moderno, pronto para imprimir em PDF.</p>
    </div>
    <div class="d-flex gap-2">
      <a class="btn btn-light btn-outline-dark" target="_blank" href="README.html"><i class="bi bi-book"></i> Ajuda</a>
      <button type="button" id="fillExample" class="btn btn-dark"><i class="bi bi-magic"></i> Carregar Exemplo</button>
    </div>
  </div>
</header>

<main class="container my-4">
  <div class="row g-4">
    <div class="col-12 col-xl-10 mx-auto">
      <div class="card shadow-soft border-0">
        <div class="card-body p-4 p-lg-5">
          <form method="post" action="resume.php" id="cvForm">
            <div class="row g-4">
              <div class="col-12">
                <h2 class="section-label"><i class="bi bi-person-vcard"></i> Dados Pessoais</h2>
              </div>
              <div class="col-md-6">
                <label class="form-label">Nome completo</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Data de nascimento</label>
                <input type="date" name="nascimento" id="nascimento" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Idade</label>
                <input type="number" name="idade" id="idade" class="form-control" readonly placeholder="auto">
              </div>
              <div class="col-md-6">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control">
              </div>
              <div class="col-12">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Rua, número, bairro, cidade - UF">
              </div>
              <div class="col-12">
                <label class="form-label">Resumo profissional</label>
                <textarea name="resumo" id="resumo" rows="3" class="form-control" placeholder="Breve resumo de 2-4 linhas"></textarea>
              </div>
              <div class="col-12">
                <label class="form-label">Habilidades (separe por vírgula)</label>
                <input type="text" name="skills" id="skills" class="form-control" placeholder="SQL, Python, Power BI, ...">
              </div>
            </div>

            <hr class="divider my-5">

            <div class="row g-4">
              <div class="col-12">
                <h2 class="section-label"><i class="bi bi-mortarboard"></i> Formação Acadêmica</h2>
              </div>
              <div id="educacoes"></div>
              <div class="col-12">
                <button type="button" class="btn btn-outline-primary" id="addEduc"><i class="bi bi-plus-circle"></i> Adicionar formação</button>
              </div>
            </div>

            <hr class="divider my-5">

            <div class="row g-4">
              <div class="col-12">
                <h2 class="section-label"><i class="bi bi-briefcase"></i> Experiências Profissionais</h2>
              </div>
              <div id="experiencias"></div>
              <div class="col-12">
                <button type="button" class="btn btn-outline-primary" id="addExp"><i class="bi bi-plus-circle"></i> Adicionar experiência</button>
              </div>
            </div>

            <hr class="divider my-5">

            <div class="row g-4">
              <div class="col-12">
                <h2 class="section-label"><i class="bi bi-people"></i> Referências</h2>
              </div>
              <div id="referencias"></div>
              <div class="col-12">
                <button type="button" class="btn btn-outline-primary" id="addRef"><i class="bi bi-plus-circle"></i> Adicionar referência</button>
              </div>
            </div>

            <div class="text-end mt-5">
              <button class="btn btn-success btn-lg px-4" type="submit"><i class="bi bi-filetype-pdf"></i> Gerar Currículo</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="footer py-4 text-center text-muted">
  <small>APO • Fundamentos de Programação para Internet</small>
</footer>

<script src="assets/script.js"></script>
</body>
</html>
