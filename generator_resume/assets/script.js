// assets/script.js — Campos dinâmicos + exemplo Data Scientist — v4

function calcAgeFromDateStr(dateStr){
  if(!dateStr) return "";
  const d = new Date(dateStr);
  if(isNaN(d)) return "";
  const now = new Date();
  let age = now.getFullYear() - d.getFullYear();
  const m = now.getMonth() - d.getMonth();
  if (m < 0 || (m === 0 && now.getDate() < d.getDate())) age--;
  return age;
}

$(function(){
  $('#nascimento').on('change', function(){
    $('#idade').val(calcAgeFromDateStr($(this).val()));
  });

  function educTpl(i, data){
    const d = data || {};
    return `
      <div class="card card-body border-0 bg-light mt-2 educ-block">
        <div class="row g-2">
          <div class="col-md-6">
            <label class="form-label">Curso</label>
            <input name="educ[${i}][curso]" class="form-control" value="${d.curso||''}" placeholder="Análise e Desenvolvimento de Sistemas">
          </div>
          <div class="col-md-4">
            <label class="form-label">Instituição</label>
            <input name="educ[${i}][inst]" class="form-control" value="${d.inst||''}" placeholder="UNIPAR">
          </div>
          <div class="col-md-2">
            <label class="form-label">Ano</label>
            <input name="educ[${i}][ano]" class="form-control" value="${d.ano||''}" placeholder="2025">
          </div>
        </div>
        <div class="text-end mt-2">
          <button type="button" class="btn btn-sm btn-outline-danger remove-block">Remover</button>
        </div>
      </div>`;
  }

  function expTpl(i, data){
    const d = data || {};
    return `
      <div class="card card-body border-0 bg-light mt-2 exp-block">
        <div class="row g-2">
          <div class="col-md-4">
            <label class="form-label">Cargo</label>
            <input name="exp[${i}][cargo]" class="form-control" value="${d.cargo||''}" placeholder="Desenvolvedor Web">
          </div>
          <div class="col-md-4">
            <label class="form-label">Empresa</label>
            <input name="exp[${i}][empresa]" class="form-control" value="${d.empresa||''}" placeholder="Empresa XYZ">
          </div>
          <div class="col-md-2">
            <label class="form-label">Início</label>
            <input name="exp[${i}][inicio]" class="form-control" value="${d.inicio||''}" placeholder="01/2023">
          </div>
          <div class="col-md-2">
            <label class="form-label">Fim</label>
            <input name="exp[${i}][fim]" class="form-control" value="${d.fim||''}" placeholder="Atual">
          </div>
          <div class="col-12">
            <label class="form-label">Descrição / Realizações</label>
            <textarea name="exp[${i}][desc]" class="form-control" rows="2" placeholder="Principais entregas, resultados, tecnologias...">${d.desc||''}</textarea>
          </div>
        </div>
        <div class="text-end mt-2">
          <button type="button" class="btn btn-sm btn-outline-danger remove-block">Remover</button>
        </div>
      </div>`;
  }

  function refTpl(i, data){
    const d = data || {};
    return `
      <div class="card card-body border-0 bg-light mt-2 ref-block">
        <div class="row g-2">
          <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input name="ref[${i}][nome]" class="form-control" value="${d.nome||''}" placeholder="Nome da referência">
          </div>
          <div class="col-md-6">
            <label class="form-label">Contato</label>
            <input name="ref[${i}][contato]" class="form-control" value="${d.contato||''}" placeholder="E-mail/Telefone/LinkedIn">
          </div>
        </div>
        <div class="text-end mt-2">
          <button type="button" class="btn btn-sm btn-outline-danger remove-block">Remover</button>
        </div>
      </div>`;
  }

  let iEduc = 0, iExp = 0, iRef = 0;

  $('#educacoes').append(educTpl(iEduc++));
  $('#experiencias').append(expTpl(iExp++));
  $('#referencias').append(refTpl(iRef++));

  $('#addEduc').on('click', () => $('#educacoes').append(educTpl(iEduc++)));
  $('#addExp').on('click', () => $('#experiencias').append(expTpl(iExp++)));
  $('#addRef').on('click', () => $('#referencias').append(refTpl(iRef++)));
  $(document).on('click', '.remove-block', function(){ $(this).closest('.card').remove(); });

  // Exemplo: Perfil inventado de Cientista de Dados (Itaú, Serasa, HSBC, TIM)
  $('#fillExample').on('click', function(){
    $('#nome').val('Lucas Alberto Mendes');
    $('#email').val('lucas.mendes.datasci@example.com');
    $('#telefone').val('+55 (11) 9 9123-4567');
    $('#endereco').val('Av. Paulista, 2000 - São Paulo, SP, Brasil');
    $('#nascimento').val('1985-05-30').trigger('change');
    $('#resumo').val('Cientista de Dados sênior com 10+ anos de experiência em projetos de analytics, modelos preditivos e engenharia de dados. Atuação em bancos e grandes corporações de telecom e crédito, liderando times e entregando soluções de Machine Learning em produção.');
    $('#skills').val('Python, SQL, PySpark, scikit-learn, TensorFlow, Airflow, Docker, Kubernetes, BigQuery, Power BI, DAX, NLP, Modelo Preditivo');

    $('#educacoes').empty(); iEduc = 0;
    $('#experiencias').empty(); iExp = 0;
    $('#referencias').empty(); iRef = 0;

    $('#educacoes').append(educTpl(iEduc++, {curso:'Mestrado em Ciência de Dados', inst:'Universidade de São Paulo (USP)', ano:'2017'}));
    $('#educacoes').append(educTpl(iEduc++, {curso:'Bacharel em Estatística', inst:'Universidade Federal de São Carlos (UFSCar)', ano:'2013'}));

    $('#experiencias').append(expTpl(iExp++, {
      cargo:'Lead Data Scientist',
      empresa:'Itaú Unibanco',
      inicio:'03/2022', fim:'Atual',
      desc:'Liderança técnica de equipe de Data Science; desenvolvimento de modelos de crédito e score de risco com XGBoost e modelos interpretáveis; integração com pipelines de produção via Airflow e Docker; redução de perdas em 7%.'
    }));
    $('#experiencias').append(expTpl(iExp++, {
      cargo:'Data Scientist Sênior',
      empresa:'Serasa Experian',
      inicio:'02/2019', fim:'02/2022',
      desc:'Modelagem preditiva para prevenção de fraude e segmentação; pipelines em PySpark; scoring em tempo real via APIs; orquestração com Airflow.'
    }));
    $('#experiencias').append(expTpl(iExp++, {
      cargo:'Data Scientist',
      empresa:'HSBC Brasil',
      inicio:'01/2016', fim:'01/2019',
      desc:'Detecção de anomalias e otimização de campanhas; automação de ETL com Python; integração com SQL Server e AWS S3.'
    }));
    $('#experiencias').append(expTpl(iExp++, {
      cargo:'Analista de Dados',
      empresa:'TIM Brasil',
      inicio:'07/2013', fim:'12/2015',
      desc:'Análises de churn e comportamento de clientes; dashboards em Power BI; modelagem em SQL para grandes volumes.'
    }));

    $('#referencias').append(refTpl(iRef++, {nome:'Mariana Costa', contato:'Gerente de Analytics — mariana.costa@itau.com'}));
    $('#referencias').append(refTpl(iRef++, {nome:'Eduardo Ribeiro', contato:'Diretor de Produtos — eduardo.ribeiro@serasa.com'}));
  });
});
