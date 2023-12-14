<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tienda de Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <!--Barra de navegacion    -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background: rgb(2, 2, 2);">
        <div class="container">
          <a class="navbar-brand" href="#carouselExampleIndicators"><img class="img-fluid small-image" src="img\logo 1.png" alt="" style="width: 190px; height: 60px; border-radius:0.5rem;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
          aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse"
           id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            
              <li class="nav-item">
                <a class="nav-link" href="#ofertas">Ofertas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#cafes">Cafes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#anuncios">Anuncios</a>
              </li>
              <li id="cart-nav">
                <div id="carrito-icon">
                    <a class="nav-link" href="#" id="show-cart" onclick="event.preventDefault();"><i class="fas fa-shopping-cart"></i> Carrito</a>
                    <span id="cart-notification">0</span> <!-- Notificación del carrito -->
                </div>
                <div id="carrito" style="display: none;">
                    <p id="total-quantity">Cantidad total: 0</p>
                    <p id="total-price">Precio total: $0.00</p>
                    <button id="checkout">Comprar</button>
                    <button id="vaciar-carrito">vaciar</button>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>

            </ul>

          </div>
        </div>
      </nav>


    {{-- ventana flotando confirmacion de pago --}}
    <div id="modal-background">
        <div id="modal">
          <div id="modal-content">
            <h2>Seleccione su método de pago</h2>
            <!-- Your existing modal content -->
            <form action="/purchase/store" method="POST">
                @csrf
                <div>
                    <label for="payment">Método de Pago:</label>
                    <select id="payment" name="payment" required>
                        <option value="efectivo">Efectivo</option>
                        <option value="credito">Crédito</option>
                    </select>
                </div>
            
                <div>
                    <label for="names">Nombre:</label>
                    <input type="text" id="names" name="names" required>
                </div>
            
                <div>
                    <label for="phone">Teléfono:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
            
                <div>
                    <button id="cancel" type="button">Cancelar</button>
                    <button id="confirm" type="submit">Confirmar</button>
                </div>
            </form>
                 
          </div>
        </div>
    </div>


 <!--Carrusel de imagenes-->

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://cdn.pixabay.com/photo/2017/06/15/19/37/coffee-2406443_640.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            <h5>¡Descubre</h5>
                            <p>¡Bienvenidos a Café Aromático!</p>              
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://cdn.pixabay.com/photo/2017/05/30/22/24/coffee-2358392_640.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            <h5>la magia</h5>
                            <p> El lugar donde los sueños se mezclan con el aroma del café</p>                            
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://cdn.pixabay.com/photo/2016/01/02/04/59/coffee-1117933_640.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            <h5>en Café</h5>
                            <p>Descubre una experiencia única llena de sabores cautivadores y momentos inolvidables</p>                           
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1515442261605-65987783cb6a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by
            1yZWxhdGVkfDE3fHx8ZW58MHx8fHx8&w=1000&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            <h5>Aromático!</h5>
                            <p>¡Ven y déjate seducir por el placer de una taza perfecta!</p>                           
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <!-- SECCION FILTROS -->
    <div class="container">
        <h2 class="fil">Filtro de Café</h2>
        <br>
        <div class="d-flex justify-content-center">
            <button id="toggleButton">Filtro</button>
        </div>
        <section class="filters" style="display: none;">
            <h2>Filtros</h2>
            <label for="type">Tipo:</label>
                <select id="type">
                    <option value="">Todos</option>
                    <option value="Arábica">Arábica</option>
                    <option value="Robusta">Robusta</option>
                    <option value="Libérica">Libérica</option>
                    <option value="Excelsa">Excelsa</option>
                    <option value="Latte">Latte</option>
                    <option value="Espresso">Espresso</option>
                    <option value="Americano">Americano</option>
                </select>
            <label for="origin">Origen:</label>
            <select id="origin">
                <option value="">Todos</option>
                <option value="México">México</option>
                <option value="Kenia">Kenia</option>
            </select>
    
            <label for="price">Precio máximo:</label>
            <input type="number" id="price" min="0" step="0.01">
            <!-- Agrega un campo de búsqueda de nombre -->
            <label for="name">Nombre:</label>
            <input type="text" id="name">
    
            <button id="filterButton">Filtrar</button>
            <button id="resetButton">Restablecer</button>
        </section>
    </div>

    
<!-- seccion de las ofertas -->
<section id="ofertas" class="section-padding" >
    <div class="section-header text-center pb-5">
        <h2 >OFERTAS</h2>
        <p>¡Descubre nuestras irresistibles ofertas de café en nuestra cafetería! <br>
            Ven y disfruta de una amplia variedad de sabores y estilos de café, preparados con amor y cuidado. <br>
             ¡Te esperamos para brindarte una experiencia única en cada taza! 🌟☕️✨</p>
     </div>
</section>

<section  class="products" style="margin-top: -8rem">
    <div class="product-group">
        <div class="product card-product"  data-type="Vietnamita" data-origin="Kenia" data-price="4.60">
            <h3>Café Vietnamita</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe1.jpg') }}" alt="Café Vietnamita">
            <div class="discount">15%</div>
            <p class="price"><s>$5.75</s> $4.60</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="6.90">
            <h3>Café Moka A</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe2.jpg') }}" alt="Café Moka A">
            <div class="discount">18%</div>
            <p class="price"><s>$8.45</s> $6.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="5.30">
            <h3>Café Maragogype A</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe3.jpg') }}" alt="Café Maragogype A">
            <div class="discount">14%</div>
            <p class="price"><s>$6.20</s> $5.30</p>
            <div class="quantity-control"> 
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="7.25">
            <h3>Café Bourbon A</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe4.jpg') }}" alt="Café Bourbon A">
            <div class="discount">22%</div>
            <p class="price"><s>$9.30</s> $7.25</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
    
        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="4.95">
            <h3>Café Mondo Novo A</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe5.jpg') }}" alt="Café Mondo Novo A">
            <div class="discount">16%</div>
            <p class="price"><s>$5.90</s> $4.95</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="6.40">
            <h3>Café Leroy A</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe6.jpg') }}" alt="Café Leroy A">
            <div class="discount">20%</div>
            <p class="price"><s>$8.00</s> $6.40</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="5.80">
        <h3>Café Caturra A</h3>
        <img class="product-image" src="{{ asset('storage/ofertas/cafe7.jpg') }}" alt="Café Caturra A">
        <div class="discount">18%</div>
        <p class="price"><s>$7.10</s> $5.80</p>
        <div class="quantity-control">
            <button class="decrement">-</button>
            <input type="number" value="1" min="1" class="quantity">
            <button class="increment">+</button>
        </div>
        <button class="add-to-cart">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <div class="details" style="display: none;"></div>
        </div>
    
        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="5.50">
        <h3>Café Catuai A</h3>
        <img class="product-image" src="{{ asset('storage/ofertas/cafe8.jpg') }}" alt="Café Catuai A">
        <div class="discount">12%</div>
        <p class="price"><s>$6.25</s> $5.50</p>
        <div class="quantity-control">
            <button class="decrement">-</button>
            <input type="number" value="1" min="1" class="quantity">
            <button class="increment">+</button>
        </div>
        <button class="add-to-cart">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Robusta" data-origin="México" data-price="4.20">
        <h3>Café Erecta A</h3>
        <img class="product-image" src="{{ asset('storage/ofertas/cafe9.jpg') }}" alt="Café Erecta A">
        <div class="discount">10%</div>
        <p class="price"><s>$4.70</s> $4.20</p>
        <div class="quantity-control">
            <button class="decrement">-</button>
            <input type="number" value="1" min="1" class="quantity">
            <button class="increment">+</button>
        </div>
        <button class="add-to-cart">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Robusta" data-origin="Kenia" data-price="3.90">
        <h3>Café Nganda A</h3>
        <img class="product-image" src="{{ asset('storage/ofertas/cafe10.jpg') }}" alt="Café Nganda A">
        <div class="discount">8%</div>
        <p class="price"><s>$4.25</s> $3.90</p>
        <div class="quantity-control">
            <button class="decrement">-</button>
            <input type="number" value="1" min="1" class="quantity">
            <button class="increment">+</button>
        </div>
        <button class="add-to-cart">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Robusta" data-origin="México" data-price="4.50">
        <h3>Café con Leche de Almendras</h3>
        <img class="product-image" src="{{ asset('storage/ofertas/cafe11.jpg') }}" alt="Café con Leche de Almendras">
        <div class="discount">12%</div>
        <p class="price"><s>$5.15</s> $4.50</p>
        <div class="quantity-control">
            <button class="decrement">-</button>
            <input type="number" value="1" min="1" class="quantity">
            <button class="increment">+</button>
        </div>
        <button class="add-to-cart">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Robusta" data-origin="Kenia" data-price="3.70">
        <h3>Café con Leche de Avena</h3>
        <img class="product-image" src="{{ asset('storage/ofertas/cafe12.jpg') }}" alt="Café con Leche de Avena">
        <div class="discount">10%</div>
        <p class="price"><s>$4.10</s> $3.70</p>
        <div class="quantity-control">
            <button class="decrement">-</button>
            <input type="number" value="1" min="1" class="quantity">
            <button class="increment">+</button>
        </div>
        <button class="add-to-cart">
            <i class="fas fa-shopping-cart"></i>
        </button>
        <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Robusta" data-origin="México" data-price="4.80">
            <h3>Café con Leche de Coco</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe13.jpg') }}" alt="Café con Leche de Coco">
            <div class="discount">15%</div>
            <p class="price"><s>$5.65</s> $4.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Robusta" data-origin="Kenia" data-price="3.50">
            <h3>Café Esencia Robusta</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe14.jpg') }}" alt="Café Esencia Robusta">
            <div class="discount">10%</div>
            <p class="price"><s>$3.90</s> $3.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Robusta" data-origin="Kenia" data-price="5.40">
            <h3>café AA Top</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe15.jpg') }}" alt="Café Esencia Robusta">
            <div class="discount">10%</div>
            <p class="price"><s>$5.80</s> $5.40</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Café con Miel" data-origin="Kenia" data-price="6.50">
            <h3>Café con Miel</h3>
            <img class="product-image" src="{{ asset('storage/ofertas/cafe16.jpg') }}" alt="Café con Miel">
            <div class="discount">12%</div>
            <p class="price"><s>$7.25</s> $6.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
    </div>
</section>

    <!-- SECCION DE LOS PRODUCTOS DE CAFE -->
<section id="cafes" class="section-padding" style="margin-top: -7rem">
    <div class="section-header text-center pb-5">
        <h2>CAFES</h2>
        <p>Descubre el café más delicioso y aromático en Café Aroma. <br>
            Nuestros expertos baristas seleccionan los mejores granos para ofrecerte una experiencia única. <br>
            ¡Ven y disfruta de la mejor taza de café en la ciudad!🌟</p>
     </div>
</section>
    
<section  class="products" style="margin-top: -10rem">
    <div class="product-group">
        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="6.00">
            <h3>Café Catimor A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee1.jpg') }}" alt="Café Catimor A">
            <p class="price">$6.00</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        
        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="5.20">
            <h3>Café Catuai B</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee2.jpg') }}" alt="Café Catuai B">
            <p class="price">$5.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        
        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="7.80">
            <h3>Café Costa Rica 95 A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee3.jpg') }}" alt="Café Costa Rica 95 A">
            <p class="price">$7.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        
        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="5.90">
            <h3>Café Gran Colom A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee4.jpg') }}" alt="Café Gran Colom A">
            <p class="price">$5.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        
        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="8.40">
            <h3>Café Limaní A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee5.jpg') }}" alt="Café Limaní A">
            <p class="price">$8.40</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Robusta" data-origin="Kenia" data-price="4.20">
            <h3>Café Robusta Supreme B</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee6.jpg') }}" alt="Café Robusta Supreme B">
            <p class="price">$4.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Liberica" data-origin="México" data-price="6.90">
            <h3>Café Liberica Deluxe A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee7.jpg') }}" alt="Café Liberica Deluxe A">
            <p class="price">$6.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Excelsa" data-origin="Kenia" data-price="5.60">
            <h3>Café Excelsa Premium B</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee8.jpg') }}" alt="Café Excelsa Premium B">
            <p class="price">$5.60</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="México" data-price="4.80">
            <h3>Café Espresso Supreme A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee9.jpg') }}" alt="Café Espresso Supreme A">
            <p class="price">$4.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="Kenia" data-price="3.50">
            <h3>Café Americano Deluxe B</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee10.jpg') }}" alt="Café Americano Deluxe B">
            <p class="price">$3.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="México" data-price="6.20">
            <h3>Café Cappuccino Supreme A</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee11.jpg') }}" alt="Café Cappuccino Supreme A">
            <p class="price">$6.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="Kenia" data-price="5.20">
            <h3>Latte Deluxe B</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee12.jpg') }}" alt="Latte Deluxe B">
            <p class="price">$5.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americamo" data-origin="México" data-price="5.80">
            <h3>Café de la Montaña Especial</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee13.jpg') }}" alt="Café de la Montaña Especial">
            <p class="price">$5.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="Kenia" data-price="6.20">
            <h3>Café con Almendras Clásica</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee14.jpg') }}" alt="Café con Almendras Clásica">
            <p class="price">$6.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="México" data-price="5.50">
            <h3>Café del Bosque Especial</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee15.jpg') }}" alt="Café del Bosque Especial">
            <p class="price">$5.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="Kenia" data-price="5.90">
            <h3>Café del Arte Especial</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee16.jpg') }}" alt="Café del Arte Especial">
            <p class="price">$5.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="6.00">
            <h3>Café de la Tradición Clásico</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee17.jpg') }}" alt="Café de la Tradición Clásico">
            <p class="price">$6.00</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="México" data-price="4.50">
            <h3>Flat White Classic</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee18.jpg') }}" alt="Flat White Classic">
            <p class="price">$4.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="Kenia" data-price="3.80">
            <h3>Cortado Clásico</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee19.jpg') }}" alt="Cortado Clásico">
            <p class="price">$3.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="Kenia" data-price="5.20">
            <h3>Affogato Classico</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee20.jpg') }}" alt="Affogato Classico">
            <p class="price">$5.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="México" data-price="6.50">
            <h3>Frappuccino Mocha</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee21.jpg') }}" alt="Frappuccino Mocha">
            <p class="price">$6.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="Kenia" data-price="4.80">
            <h3>Macchiato Coffee Traditional</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee22.jpg') }}" alt="Macchiato Coffee Traditional">
            <p class="price">$4.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="Kenia" data-price="4.50">
            <h3>Ristretto Coffee Traditional</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee23.jpg') }}" alt="Ristretto Coffee Traditional">
            <p class="price">$4.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="Kenia" data-price="5.50">
            <h3>Ethiopian Coffee Blend</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee24.jpg') }}" alt="Ethiopian Coffee Blend">
            <p class="price">$5.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="México" data-price="6.20">
            <h3>Café con Especias Classic</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee25.jpg') }}" alt="Café con Especias Classic">
            <p class="price">$6.20</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="México" data-price="4.80">
            <h3>Café de la Plaza Blend</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee26.jpg') }}" alt="Café de la Plaza Blend">
            <p class="price">$4.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="México" data-price="5.90">
            <h3>Café del Paseante Classic</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee27.jpg') }}" alt="Café del Paseante Classic">
            <p class="price">$5.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="México" data-price="6.10">
            <h3>Café con Nata Blend</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee28.jpg') }}" alt="Café con Nata Blend">
            <p class="price">$6.10</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Americano" data-origin="Kenia" data-price="8.50">
            <h3>Jamaican Blue Mountain Coffee Classic</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee29.jpg') }}" alt="Jamaican Blue Mountain Coffee Classic">
            <p class="price">$8.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="Mexico" data-price="5.40">
            <h3>Mexican Coffee Blend</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee30.jpg') }}" alt="Mexican Coffee Blend">
            <p class="price">$5.40</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="México" data-price="5.80">
            <h3>Café con Caramelo Classic</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee31.jpg') }}" alt="Café con Caramelo Classic">
            <p class="price">$5.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div> 

        <div class="product card-product" data-type="Americano" data-origin="México" data-price="5.50">
            <h3>Café de la Huerta Especial</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee32.jpg') }}" alt="Café de la Huerta Especial">
            <p class="price">$5.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Espresso" data-origin="México" data-price="5.70">
            <h3>Café del Jardín Especial</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee33.jpg') }}" alt="Café del Jardín Especial">
            <p class="price">$5.70</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Arábica" data-origin="México" data-price="8.90">
            <h3>Café del Barrio</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee34.jpg') }}" alt="Café del Barrio">
            <p class="price">$8.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Robusta" data-origin="Kenia" data-price="10.99">
            <h3>Café con Vainilla</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee35.jpg') }}" alt="Café con Vainilla">
            <p class="price">$10.99</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Excelsa" data-origin="Kenia" data-price="9.50">
            <h3>Café Cielo y Tierra</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee36.jpg') }}" alt="Café Cielo y Tierra">
            <p class="price">$9.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Libérica" data-origin="México" data-price="7.88">
            <h3>La Casa del Café</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee37.jpg') }}" alt="La Casa del Café">
            <p class="price">$7.88</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Arábica" data-origin="Kenia" data-price="8.35">
            <h3>Café de la Plaza</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee38.jpg') }}" alt="Café de la Plaza">
            <p class="price">$8.35</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Latte" data-origin="Kenia" data-price="6.80">
            <h3>Café del Paseante</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee39.jpg') }}" alt="Café del Paseante">
            <p class="price">$6.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Excelsa" data-origin="Kenia" data-price="7.00">
            <h3>Café de los Sueños</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee40.jpg') }}" alt="Café de los Sueños">
            <p class="price">$7.00</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Excelsa" data-origin="México" data-price="9.00">
            <h3>Café Sabor</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee41.jpg') }}" alt="Café Sabor">
            <p class="price">$9.00</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Robusta" data-origin="México" data-price="9.40">
            <h3>Café Encantado</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee42.jpg') }}" alt="Café Encantado">
            <p class="price">$9.40</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Libérica" data-origin="México" data-price="7.55">
            <h3>Café Caliente</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee43.jpg') }}" alt="Café Caliente">
            <p class="price">$7.55</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Americano" data-origin="México" data-price="9.88">
            <h3>Café de la Mañana</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee44.jpg') }}" alt="Café de la Mañana">
            <p class="price">$9.88</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Espresso" data-origin="México" data-price="10.50">
            <h3>Café Amistad</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee45.jpg') }}" alt="Café Amistad">
            <p class="price">$10.50</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>

        <div class="product card-product" data-type="Latte" data-origin="México" data-price="5.00">
            <h3>Café Irlandés</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee46.jpg') }}" alt="Café Irlandés">
            <p class="price">$5.00</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Espresso" data-origin="México" data-price="5.80">
            <h3>Café Vienés</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee47.jpg') }}" alt="Café Vienés">
            <p class="price">$5.80</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
        
        <div class="product card-product" data-type="Robusta" data-origin="México" data-price="6.90">
            <h3>Café con Chocolate</h3>
            <img class="product-image" src="{{ asset('storage/producto/coffee48.jpg') }}" alt="Café con Chocolate">
            <p class="price">$6.90</p>
            <div class="quantity-control">
                <button class="decrement">-</button>
                <input type="number" value="1" min="1" class="quantity">
                <button class="increment">+</button>
            </div>
            <button class="add-to-cart">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <div class="details" style="display: none;"></div>
        </div>
    </div>
</section>

  <!--Seccion ANUNCIOS-->
<section class="team section-padding" id="anuncios" style="margin-top: -6rem">
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="section-header text-center pb-5">
                  <h2>ANUNCIOS</h2>
                  <p>¡Bienvenidos aBienvenidos a nuestro muro de anuncios! Aquí encontrarás información relevante,<br> promociones emocionantes y eventos especiales.<br>
                     Mantente al tanto de las últimas novedades y descubre todo lo que tenemos preparado para ti.<br>
                    ¡No te pierdas nuestras actualizaciones y únete a la diversión en Café Aromatico!</p>
               </div>
          </div>
       </div>

       <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 ">
            <div class="card text-center" style="margin-left: 3rem; border-color: rgb(163, 124, 52);">
                <div class="card-body">
                    <img src="https://cdn.pixabay.com/photo/2017/06/22/15/21/coffee-2431159_640.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">¡Se requieren nuevos empleados!</h3>
                    <p class="card-text">¿Te apasiona el café y el servicio al cliente?
                    Estamos buscando personas entusiastas y comprometidas para unirse.
                    ¡Envía tu currículum ahora!</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 ">
            <div class="card text-center" style="margin-left: 3rem; border-color: rgb(163, 124, 52); position: relative; overflow: hidden;">
                <div class="card-body">
                    <img src="https://img.freepik.com/vector-gratis/linda-mujer-hombre-bailando-decoracion-confeti_24640-46480.jpg?size=338&ext=jpg&ga=GA1.1.1826414947.1699142400&semt=ais" alt="" class="img-fluid rounded-circle" style="max-width: 250px; max-height: 250px;">
                    <h3 class="card-title py-2">Jack Wilson 😁</h3>
                    <p class="card-text">¡Felicidades a Jack Wilson por ganar el premio del concurso de nuestra cafetería!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mt-5" >
            <div class="card text-center" style="margin-left: 3rem; border-color: rgb(163, 124, 52);">
                <div class="card-body">
                    <img src="https://cdn.pixabay.com/photo/2019/03/18/19/30/coffee-4063915_640.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">Maximiliano Juarez</h3>
                    <p class="card-text">¡Experimenta la excelencia de nuestro barista estrella! En Café Aromático,
                    nuestro talentoso barista te deleitará con su preparación.
                    Ven y disfruta de cada café.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mt-5">
            <div class="card text-center" style="margin-left: 3rem; border-color: rgb(163, 124, 52);">
                <div class="card-body">
                    <img src="https://cdn.pixabay.com/photo/2015/05/07/13/46/cappuccino-756490_640.jpg" alt="" class="img-fluid rounded-circle">
                    <h3 class="card-title py-2">Café Cappuccino Supreme A</h3>
                    <p class="card-text">El café capuccino: El más pedido, cremoso, suave y lleno de sabor.
                    ¡Ven y prueba nuestro delicioso capuchino en Café Aromático!</p>
                </div>
            </div>
        </div>
    </div> 
    </div>
</section>
    

<!--Seccion Foother-->
<footer class="footer mt-auto py-3 bg-secondary text-white" >
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Sobre Nosotros</h5>
                <p>¡Bienvenidos a Café Aromático! Pasión por el café excepcional en un ambiente acogedor.
                     Disfruta de nuestras tazas cuidadosamente preparadas para despertar tus sentidos. 
                     ¡Únete a nosotros y vive momentos inolvidables!<p>
            </div>
            <div class="col-md-3">
                <h5>Contacto</h5>
                <p>Dirección: 275 Av. Principal<br>
                Teléfono: 93726453<br>
                Email: aromatico@gmail.com</p>
            </div>
            <div class="col-md-3">
                <h5>Síguenos</h5>
                <div class="social-icons">
                    <a href="https://web.facebook.com/?locale=es_LA&_rdc=1&_rdr"><i class="bi bi-facebook" style="font-size: 24px; color: rgb(12, 151, 231)"></i></a>
                    <a href="https://twitter.com/?lang=es"><i class="bi bi-twitter" style="font-size: 24px; color:rgb(0, 3, 185));"></i></a>
                    <a href="https://www.instagram.com/"><i class="bi bi-instagram" style="font-size: 24px; color:#fee140;"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <span>© 2023 café aromatico. Todos los derechos reservados.</span>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/editaranuncios.js"></script>

</body>
</html>