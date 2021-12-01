const btns = document.querySelectorAll(".deleteBtn");

btns.forEach((btn) => {
  btn.addEventListener("click", function () {
    const id = this.dataset.id;

    const confirm = window.confirm("Sure bro?");

    if (confirm) {
      httpRequest(
        window.location.origin +
          window.location.pathname +
          "/deleteEmployee/" +
          id,
        function () {
          //!TODO PARA VER ERRORES DE LA QUERY => console.log(this.responseText);
          const tbody = document.querySelector("#tbody-users");
          const row = document.querySelector("#row-" + id);

          tbody.removeChild(row);
        }
      );
    }
  });
});

function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  };
}
