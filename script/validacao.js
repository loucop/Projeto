/******************\
////// CADASTRO \\\\\\
\********************/

function ajustaCpf(v) {
    v.value = v.value.replace(/\D/g, "");
    // Adiciona ponto após os três primeiros números
    v.value = v.value.replace(/^(\d{3})(\d)/, "$1.$2");
    // Adiciona ponto após os seis primeiros números
    v.value = v.value.replace(/(\d{3})(\d)/, "$1.$2");
    // Adiciona o hífen antes dos últimos 2 caracteres
    v.value = v.value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  
    // Validar o CPF para evitar números repetidos, como "111.111.111-11"
    if (v.value.match(/(\d)\1{2}\.\1{3}\.\1{3}-\1{2}/)) {
      v.setCustomValidity('CPF inválido');
      validcpf = false;
    } else {
      v.setCustomValidity('');
      validcpf = true;
    }
  }
  
  function ajustaNumeros(v) {
    // Remove os caracteres não numéricos
    v.value = v.value.replace(/\D/g, "");
  }
  
  function ajustaTelefone(v) {
    v.value = v.value.replace(/\D/g, "");
    // Adiciona parênteses no DDD
    v.value = v.value.replace(/^(\d{2})(\d)/g, "($1) $2");
    // Adiciona hífen no número do telefone
    v.value = v.value.replace(/(\d{4,5})(\d)/, "$1-$2");
  
    // Validar o telefone para evitar números repetidos
    if (v.value.match(/(\d)\1{3} \d{4}-\d{2}/)) {
      v.setCustomValidity('Telefone inválido');
      validtelefone = false;
    } else {
      v.setCustomValidity('');
      validtelefone = true;
    }
  }
  
  
  function ajustaCelular(v) {
    v.value = v.value.replace(/\D/g, "");
    // Adiciona parênteses no DDD
    v.value = v.value.replace(/^(\d{2})(\d)/g, "($1) $2");
    // Adiciona hífen no número do celular
    v.value = v.value.replace(/(\d{4,5})(\d)/, "$1-$2");
  
    // Validar o celular para evitar números repetidos ou números inválidos
    if (v.value.match(/(\d)\1{7,}/) || v.value.match(/\(0{2}\) 00000-0{2}/)) {
      v.setCustomValidity('Celular inválido');
      validcelular = false;
    } else {
      v.setCustomValidity('');
      validcelular = true;
    }
  }
  
  function maiuscula(texto) {
    texto.value = texto.value.toUpperCase();
  }
  
  function ajustaData(v) {
    v.value = v.value.replace(/\D/g, "");
    // Adiciona a barra entre o dia e o mês
    v.value = v.value.replace(/^(\d{2})(\d)/, "$1/$2");
    // Adiciona a barra entre o mês e o ano
    v.value = v.value.replace(/(\d{2})(\d)/, "$1/$2");
  }
  
  function ajustaCep(v) {
    // Adiciona hífen no número do cep
    v.value = v.value.replace(/(\d{5})(\d)/, "$1-$2");
  }
  
  
  
  
  
   /*******************************\
  ////// VALIDAÇÃO DE CADASTRO \\\\\\
  \*********************************/
  
  
  var nome = document.querySelector('#nome');
  var validnome = false
  var cpf = document.querySelector('#cpf');
  var validcpf = false
  var nomeMae = document.querySelector('#nomeMaterno');
  var validnomemae = false
  var email = document.querySelector('#email');
  var validemail = false
  var tel = document.querySelector('#tel');
  var validtelefone = false
  var cel = document.querySelector('#cel');
  var validcelular = false
  var cep = document.querySelector('#cep');
  var validcep = false
  var rua = document.querySelector('#rua');
  var bairro = document.querySelector('#bairro');
  var cidade = document.querySelector('#cidade');
  var estado = document.querySelector('#estado');
  var endereco = document.querySelector('#endereco');
  var validendereco = false
  var dataNasc = document.querySelector('#data');
  var validdata = false
  var login = document.querySelector('#login');
  var validlogin = false
  var senha = document.querySelector('#senha');
  var validsenha1 = false
  var confSenha = document.querySelector('#confSenha');
  var validsenha2 = false
  var btn = document.querySelector('btn')
  
  let msgError = document.querySelector('#msgError')
  let msgSuccess = document.querySelector('#msgSuccess')
  
  
  nome.addEventListener('keyup', () => {
    if (nome.value.length < 15) {
      nome.setCustomValidity('Preencha o campo com no mínimo 15 caracteres');
      validnome = false
    } else {
      nome.setCustomValidity('');
      validnome = true
    }
  })
  
  
  cpf.addEventListener('keyup', () => {
    if (cpf.value.length < 14 || cpf.value.match(/(\d)\1{2}\.\1{3}\.\1{3}-\1{2}/)) {
      cpf.setCustomValidity('Preencha o campo corretamente.');
      validcpf = false;
    } else {
      cpf.setCustomValidity('');
      validcpf = true;
    }
  });
  
  
  nomeMae.addEventListener('keyup', () => {
    if (nomeMae.value.length < 15) {
      nomeMae.setCustomValidity('Preencha o campo com no mínimo 15 caracteres.');
      validnomemae = false
    } else {
      nomeMae.setCustomValidity('');
    }
  })
  
  email.addEventListener('keyup', () => {
    if (email.value.length < 8) {
      email.setCustomValidity('Este campo é obrigatório, preencha corretamente.');
      validemail = false
    } else {
      email.setCustomValidity('');
      validemail = true
    }
  })
  
  
  tel.addEventListener('keyup', () => {
    if (tel.value.length < 14 || tel.value.match(/(\d)\1{3} \d{4}-\d{2}/)) {
      tel.setCustomValidity('Insira um telefone válido');
      validtelefone = false;
    } else {
      tel.setCustomValidity('');
      validtelefone = true;
    }
  });
  
  cel.addEventListener('keyup', () => {
    if (cel.value.length < 15 || cel.value.match(/(\d)\1{7,}/) || cel.value.match(/\(0{2}\) 00000-0{2}/)) {
      cel.setCustomValidity('Insira um celular válido');
      validcelular = false;
    } else {
      cel.setCustomValidity('');
      validcelular = true;
    }
  });
  
  cep.addEventListener('keyup', () => {
    if (cep.value.length < 9) {
      cep.setCustomValidity('Insira um CEP válido');
      validcep = false
    } else {
      cep.setCustomValidity('');
      validcep = true
    }
  })
  
  cep.addEventListener('blur', function(e) {
    let cep = e.target.value;
    let script = document.createElement('script');
    script.src = "https://viacep.com.br/ws/"+cep+"/json/?callback=popularForm";
    document.body.appendChild(script);
  })
  
  function popularForm(resposta) {
    if("erro" in resposta){
      alert('CEP não encontrado')
      return
    }
    console.log(resposta);
    rua.value = resposta.logradouro;
    bairro.value = resposta.bairro;
    cidade.value = resposta.localidade;
    estado.value = resposta.uf;
  }
  
  dataNasc.addEventListener('keyup', () => {
    const inputValue = dataNasc.value;
    if (inputValue.length !== 10) {
      dataNasc.setCustomValidity('Insira uma data de nascimento válida');
      validdata = false;
    } else {
      const birthDate = new Date(inputValue);
      const currentDate = new Date();
      const age = currentDate.getFullYear() - birthDate.getFullYear();
  
      if (currentDate.getMonth() < birthDate.getMonth() || (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())) {
        age--; // Ainda não fez aniversário no ano atual
      }
  
      if (age < 18 || age >= 120) {
        dataNasc.setCustomValidity('A idade deve estar entre 18 e 119 anos.');
        validdata = false;
      } else {
        dataNasc.setCustomValidity('');
        validdata = true;
      }
    }
  });
  
  senha.addEventListener('keyup', () => {
    if (senha.value.length <=7) {
      confSenha.setCustomValidity('Insira exatamente 8 caracteres');
      validsenha1 = false
    } else {
      confSenha.setCustomValidity('');
      validsenha1 = true
    }
  })
  
  confSenha.addEventListener('keyup', () => {
    if (senha.value !== confSenha.value) {
      confSenha.setCustomValidity('Senhas diferentes!');
      validsenha2 = false
    } else {
      confSenha.setCustomValidity('');
      validsenha2 = true
    }
  })
  
  //erro senha.onchange = validatePassword;
  //erro confSenha.onkeyup = validatePassword;
  
  var inputNome = document.querySelector('#login');
  inputNome.addEventListener('keypress', function(e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
  
    if (keyCode > 47 && keyCode < 58) {
      e.preventDefault();
    }
  });
  
  var inputSenha = document.querySelector('#senha');
  inputSenha.addEventListener('keypress', function(e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
  
    if (keyCode > 47 && keyCode < 58) {
      e.preventDefault();
    }
  });
  
  var inputConfSenha = document.querySelector('#confSenha');
  inputConfSenha.addEventListener('keypress', function(e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
  
    if (keyCode > 47 && keyCode < 58) {
      e.preventDefault();
    }
  });
