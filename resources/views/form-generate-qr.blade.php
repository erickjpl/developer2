<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5 col-8 col-md-6 col-lg-4">
    <h2 class="my-5 text-center">Crear Codigo QR</h2>
    <form id="formGenerateQR" action="{{ route('generate.qr') }}" method="POST" novalidate class="d-flex flex-column needs-validation">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" required data-error="El nombre es requerido.">
        <div class="invalid-feedback">Favor introduzca su nombre.</div>
      </div>

      <div class="mb-3">
        <label for="quantity" class="form-label">Cantidad:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
        <div class="invalid-feedback">Favor introduzca la cantidad requerida.</div>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Teléfono:</label>
        <input type="tel" name="phone" id="phone" class="form-control" required>
        <div class="invalid-feedback">Favor introduzca su número telefónico.</div>
      </div>

      <button type="submit" class="btn btn-primary justify-end">Enviar Datos</button>
    </form>

    <div class="modal fade" id="modalShowQR" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalShowQRLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalShowQRLabel">Su codigo QR</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div id="qrcode" class="d-flex justify-content-center"></div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('formGenerateQR').addEventListener('submit', (event) => {
        event.preventDefault()

        sendPayload(event.target.action)
      })
    })

    function sendPayload(url) {
      const form = document.getElementById('formGenerateQR');
      const modalShowQR = new bootstrap.Modal(document.getElementById('modalShowQR'))

      if (!form.checkValidity()) {
        event.stopPropagation()
        form.classList.add('was-validated')
        return
      }

      const formData = new FormData(form)
      fetch(url, {
          method: 'POST',
          body: formData,
          headers: {
            'Accept': 'application/json'
          },
        })
        .then(response => response.json())
        .then(data => {
          qrcode(data.data.codigo)

          modalShowQR.show()
          form.reset()
          form.classList.remove('was-validated')
        })
        .catch(error => {
          console.error('Error:', error)
        })
    }

    const qrcode = (data) => new QRCode(document.getElementById("qrcode"), {
      text: data,
      width: 128,
      height: 128
    })
  </script>
</body>

</html>
