<!DOCTYPE html>
<html dir="ltr">
@include('includes.head')
<body>
<div class="container">
        </div>
    </div>
    <div>
    </div>
    <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h3 class="text-center mb-4">Selecione a quantidade de tickets e a data</h3>
    
            <!-- Dropdown para selecionar a quantidade de tickets -->
            <div class="mb-3">
              <label for="ticketDropdown" class="form-label">Selecione a quantidade de tickets:</label>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="ticketDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  Selecione a quantidade de tickets
                </button>
                <ul class="dropdown-menu" aria-labelledby="ticketDropdown">
                  <li><a class="dropdown-item" href="#">1 Ticket</a></li>
                  <li><a class="dropdown-item" href="#">2 Tickets</a></li>
                  <li><a class="dropdown-item" href="#">3 Tickets</a></li>
                  <li><a class="dropdown-item" href="#">4 Tickets</a></li>
                </ul>
              </div>
            </div>
    
            <!-- Campo para selecionar a data -->
            <div class="mb-3">
              <label for="dateInput" class="form-label">Selecione a data:</label>
              <input type="date" class="form-control" id="dateInput">
            </div>
    
            <!-- Botão de enviar -->
            <div class="text-center">
              <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
    
          </div>
        </div>
      </div>
      <div>
      </div>
@include('includes.scripts')
</body>
</html>
