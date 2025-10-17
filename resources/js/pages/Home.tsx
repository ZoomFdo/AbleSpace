import React from "react";
import HomeLayout from "@/layouts/home-layout";
import {BannerSlider} from "@/components/BannerSlider";

export default function Home() {
  return (
    <HomeLayout>
      <div style={{ backgroundColor: '#F4F8FA' }}>
        {/* Навігаційна панель - розтягнута на повну ширину */}
        <div style={{ 
          width: '100vw',
          marginLeft: 'calc(-50vw + 50%)', 
          overflow: 'hidden'
        }}>
          <nav className="navbar navbar-expand-lg navbar-dark" style={{ 
            background: 'linear-gradient(to bottom, #123277 58.44%, #F4F8FA 58.44%)',
            height: '154px',
            padding: '0 20px', 
            borderRadius: '0 0 30px 30px',
            margin: '0', 
            width: '100%', 
            zIndex: 1050, 
            position: 'relative'  
          }}>
            <div className="container-fluid">
              {/* Логотип */}
              <a className="navbar-brand fw-bold" href="#" style={{ 
                fontSize: '32px', 
                color: '#FFFFFF', 
                fontWeight: '600',
                textDecoration: 'none'
              }}>
                AbleSpace
              </a>

              <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
              </button>

              <div className="collapse navbar-collapse" id="navbarNav">
                <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                  <li className="nav-item">
                    <a className="nav-link" href="#" style={{ 
                      color: '#FFFFFF', 
                      fontSize: '24px',
                      fontWeight: '400',
                      borderRadius: '21px'  
                    }}>Каталог</a>
                  </li>
                </ul>

                {/* Пошук */}
                <form className="d-flex me-3" role="search">
                  <div className="input-group" style={{ 
                    backgroundColor: '#FFFFFF', 
                    borderRadius: '30px',  
                    height: '80px',
                    border: 'none',
                    overflow: 'hidden'
                  }}>
                    <span className="input-group-text" style={{ 
                      backgroundColor: 'transparent', 
                      border: 'none',
                      padding: '0 16px',
                      color: '#49B3A7'  
                    }}>
                      <i className="bi bi-search" style={{ fontSize: '36px' }}></i>  
                    </span>
                    <input 
                      className="form-control" 
                      type="search" 
                      placeholder="Пошук" 
                      style={{ 
                        border: 'none', 
                        fontSize: '24px', 
                        fontWeight: '700', 
                        color: '#2E2E2E',
                        backgroundColor: 'transparent'
                      }}
                    />
                  </div>
                </form>

                <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li className="nav-item">
                    <a className="nav-link" href="#" style={{ 
                      color: '#FFFFFF', 
                      fontSize: '24px',
                      borderRadius: '21px'  
                    }}>Про нас</a>
                  </li>
                  <li className="nav-item">
                    <a className="nav-link" href="#" style={{ 
                      color: '#FFFFFF', 
                      fontSize: '24px',
                      borderRadius: '21px'
                    }}>Акції</a>
                  </li>
                  <li className="nav-item dropdown">
                    <a className="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style={{ 
                      color: '#FFFFFF', 
                      fontSize: '24px',
                      borderRadius: '21px'
                    }}>
                      УКР | ENG
                    </a>
                    <ul className="dropdown-menu" style={{ borderRadius: '18px' }}>  
                      <li><a className="dropdown-item" href="#">УКР</a></li>
                      <li><a className="dropdown-item" href="#">ENG</a></li>
                    </ul>
                  </li>
                  <li className="nav-item">
                    <a className="nav-link" href="#" style={{ color: '#FFFFFF', fontSize: '24px' }}>
                      <i className="bi bi-person-circle" style={{ fontSize: '36px' }}></i> 
                    </a>
                  </li>
                  <li className="nav-item">
                    <a className="nav-link" href="#" style={{ color: '#FFFFFF', fontSize: '24px' }}>
                      <i className="bi bi-heart" style={{ fontSize: '36px' }}></i>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a className="nav-link" href="#" style={{ color: '#FFFFFF', fontSize: '24px' }}>
                      <i className="bi bi-cart" style={{ fontSize: '36px' }}></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>

        <BannerSlider />

        {/* Секція груп товарів */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Групи товарів</h2>
          <div className="row row-cols-1 row-cols-md-3 g-3">
            <div className="col text-center"><i className="bi bi-eye text-3xl"></i><p>Порушення слуху</p></div>
            <div className="col text-center"><i className="bi bi-ear text-3xl"></i><p>Порушення зору</p></div>
            <div className="col text-center"><i className="bi bi-heart-pulse text-3xl"></i><p>Когнітивні особливості</p></div>
            <div className="col text-center"><i className="bi bi-person-walking text-3xl"></i><p>Мобільність</p></div>
            <div className="col text-center"><i className="bi bi-cup-straw text-3xl"></i><p>Самостійне харчування</p></div>
            <div className="col text-center"><i className="bi bi-headphones text-3xl"></i><p>Ментальне здоров'я</p></div>
            <div className="col text-center"><i className="bi bi-house-door text-3xl"></i><p>Інклюзивний дім</p></div>
            <div className="col text-center"><i className="bi bi-person text-3xl"></i><p>Надання клінічного догляду</p></div>
            <div className="col text-center"><i className="bi bi-truck text-3xl"></i><p>Транспорт</p></div>
          </div>
        </div>

        {/* Секція новинки */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Новинки</h2>
          <div className="row row-cols-1 row-cols-md-3 g-3">
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Набір адаптивного столового приладдя" className="mx-auto mb-2" />
              <p>Набір адаптивного столового приладдя</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i> (5)
              </div>
              <p className="text-red-600">809 грн</p>
              <button className="btn btn-primary">Додати до кошика</button>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Адаптивний штрик" className="mx-auto mb-2" />
              <p>Адаптивний штрик на липучках для лежачих пацієнтів</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star"></i> (4)
              </div>
              <p className="text-red-600">850 грн</p>
              <button className="btn btn-primary">Додати до кошика</button>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Слуховий апарат HearClear Pro S-200" className="mx-auto mb-2" />
              <p>Слуховий апарат HearClear Pro S-200</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i> (5)
              </div>
              <p className="text-red-600">2610 грн</p>
              <button className="btn btn-primary">Додати до кошика</button>
            </div>
          </div>
          <div className="text-center mt-3">
            <button className="btn btn-outline-secondary mx-1">1</button>
            <button className="btn btn-outline-secondary mx-1">2</button>
            <button className="btn btn-outline-secondary mx-1">3</button>
            <button className="btn btn-outline-secondary mx-1">{'>'}</button>
          </div>
        </div>

        {/* Секція акції */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Акції</h2>
          <div className="row row-cols-1 row-cols-md-3 g-3">
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Слуховий апарат HearClear Pro S-200" className="mx-auto mb-2" />
              <p>Слуховий апарат HearClear Pro S-200</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i> (5)
              </div>
              <p><del>3460 грн</del> <span className="text-red-600">3060 грн</span></p>
              <button className="btn btn-primary">Додати до кошика</button>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Слуховий апарат Jabra Enhance 500" className="mx-auto mb-2" />
              <p>Слуховий апарат Jabra Enhance 500</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i> (5)
              </div>
              <p><del>4610 грн</del> <span className="text-red-600">4500 грн</span></p>
              <button className="btn btn-primary">Додати до кошика</button>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Матрац проти пролежнів" className="mx-auto mb-2" />
              <p>Матрац проти пролежнів з компресором VSH03</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star"></i> (4)
              </div>
              <p><del>2500 грн</del> <span className="text-red-600">1900 грн</span></p>
              <button className="btn btn-primary">Додати до кошика</button>
            </div>
          </div>
          <div className="text-center mt-3">
            <button className="btn btn-outline-secondary mx-1">1</button>
            <button className="btn btn-outline-secondary mx-1">2</button>
            <button className="btn btn-outline-secondary mx-1">3</button>
            <button className="btn btn-outline-secondary mx-1">{'>'}</button>
          </div>
        </div>

        {/* */}
        <div className="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
          <div className="col">
            <div className="card p-3">
              <h2 className="card-title text-xl font-semibold mb-2">Оголошення</h2>
              <p className="card-text text-gray-600">
                Тут буде список останніх оголошень. Підтягувати з API.
              </p>
            </div>
          </div>
          <div className="col">
            <div className="card p-3">
              <h2 className="card-title text-xl font-semibold mb-2">Популярні категорії</h2>
              <ul className="list-group list-group-flush text-gray-600">
                <li className="list-group-item">Електроніка</li>
                <li className="list-group-item">Одяг</li>
                <li className="list-group-item">Послуги</li>
              </ul>
            </div>
          </div>
          <div className="col">
            <div className="card p-3">
              <h2 className="card-title text-xl font-semibold mb-2">Новини</h2>
              <p className="card-text text-gray-600">Актуальні оновлення та інформація для користувачів.</p>
            </div>
          </div>
        </div>

        {/* Секція блог */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Блог</h2>
          <div className="row row-cols-1 row-cols-md-3 g-3">
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Неймовірна система масажу" className="mx-auto mb-2" />
              <p>Неймовірна система масажу в кріслі</p>
              <p>01.03.2025</p>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Опора на колінний суглоб" className="mx-auto mb-2" />
              <p>Опора на колінний суглоб: чому це важливо?</p>
              <p>24.02.2025</p>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Покращення якості життя" className="mx-auto mb-2" />
              <p>Покращення якості життя, або чому важливі аксесуари?</p>
              <p>17.02.2025</p>
            </div>
          </div>
        </div>

        {/* Секція відгуки клієнтів */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Відгуки клієнтів</h2>
          <div className="row row-cols-1 row-cols-md-3 g-3">
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Слуховий апарат Jabra Enhance 500" className="mx-auto mb-2" />
              <p>Слуховий апарат Jabra Enhance 500</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i> (5)
              </div>
              <p>Мої перші апарат був дуже гучним. Але після налаштування з допомогою служби підтримки Jabra все стало ідеально.</p>
              <button className="btn btn-outline-primary">Читати далі...</button>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Слуховий апарат Pro S-200" className="mx-auto mb-2" />
              <p>Слуховий апарат Pro S-200</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i> (5)
              </div>
              <p>Дуже задоволений якістю звуку. Для мене це найкращий вибір із запропонованих варіантів.</p>
              <button className="btn btn-outline-primary">Читати далі...</button>
            </div>
            <div className="col text-center">
              <img src="https://via.placeholder.com/150" alt="Ходунки для Ortomedia Castor 3" className="mx-auto mb-2" />
              <p>Ходунки для Ortomedia Castor 3</p>
              <div className="rating">
                <i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star-fill"></i><i className="bi bi-star"></i> (4)
              </div>
              <p>Стабільність хороша, але іноді важко складати. Рекомендую для людей із середньою вагою.</p>
              <button className="btn btn-outline-primary">Читати далі...</button>
            </div>
          </div>
        </div>

        {/* Секція наші партнери */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Наші партнери</h2>
          <div className="row row-cols-1 row-cols-md-5 g-3 justify-content-center">
            <div className="col text-center"><img src="https://via.placeholder.com/100" alt="Eye-Able" className="mx-auto" /></div>
            <div className="col text-center"><img src="https://via.placeholder.com/100" alt="Elite" className="mx-auto" /></div>
            <div className="col text-center"><img src="https://via.placeholder.com/100" alt="AC Company" className="mx-auto" /></div>
            <div className="col text-center"><img src="https://via.placeholder.com/100" alt="Halal" className="mx-auto" /></div>
            <div className="col text-center"><img src="https://via.placeholder.com/100" alt="Company" className="mx-auto" /></div>
          </div>
        </div>

        {/* Секція Часті питання */}
        <div className="container py-4 mb-4">
          <h2 className="text-2xl font-bold text-center mb-3">Frequently Asked Questions</h2>
          <div className="accordion" id="faqAccordion">
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingOne">
                <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Як ми можемо вам допомогти?
                </button>
              </h2>
              <div id="collapseOne" className="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div className="accordion-body">
                  Тут буде відповідь на питання.
                </div>
              </div>
            </div>
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingTwo">
                <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Чи потрібні замовлення?
                </button>
              </h2>
              <div id="collapseTwo" className="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div className="accordion-body">
                  Тут буде відповідь на питання.
                </div>
              </div>
            </div>
            <div className="accordion-item">
              <h2 className="accordion-header" id="headingThree">
                <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Як оплатити замовлення?
                </button>
              </h2>
              <div id="collapseThree" className="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div className="accordion-body">
                  Тут буде відповідь на питання.
                </div>
              </div>
            </div>
          </div>
        </div>

        {/* Секція контакти */}
        <div className="container py-4">
          <h2 className="text-2xl font-bold text-center mb-3">Контакти</h2>
          <div className="text-center">
            <p><i className="bi bi-telephone"></i> +380 44 123 4567</p>
            <p><i className="bi bi-envelope"></i> info@ablespace.com</p>
            <p><i className="bi bi-geo-alt"></i> м. Київ, вул. Хрещатик 1</p>
          </div>
        </div>
      </div>
    </HomeLayout>
  );
}