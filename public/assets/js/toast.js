
// Função para exibir um alerta de erro
export const alertError = (text) => {
  Toastify({
    text: text,
    duration: 3000,
    style: {
      background: "linear-gradient(to right, #dc3545, #ff7d8a)",
    }
  }).showToast();
};

// Função para exibir um alerta de sucesso
export const alertSuccess = (text) => {
  Toastify({
    text: text,
    duration: 3000,
    style: {
      background: "linear-gradient(to right, #5cb85c, #82e0aa)",
    }
  }).showToast();
};

// Função para exibir um alerta de aviso
export const alertWarning = (text) => {
  Toastify({
    text: text,
    duration: 3000,
    style: {
      background: "linear-gradient(to right, #f0ad4e, #fadcb0)",
    }
  }).showToast();
};

// Função para exibir um alerta de informação
export const alertInfo = (text) => {
  Toastify({
    text: text,
    duration: 3000,
    style: {
      background: "linear-gradient(to right, #5bc0de, #a7e7ff)",
    }
  }).showToast();
};

