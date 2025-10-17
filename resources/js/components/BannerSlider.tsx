import { useEffect } from "react";
import Swiper from "swiper";
import "swiper/css";
import "swiper/css/pagination";
import { Pagination, Autoplay } from "swiper/modules";
import "../../css/styles/banner.css";

export const BannerSlider = () => {
  useEffect(() => {
    new Swiper(".banner-swiper", {
      modules: [Pagination, Autoplay],
      loop: true,
      pagination: { el: ".swiper-pagination", clickable: true },
      autoplay: { delay: 4000, disableOnInteraction: false },
    });
  }, []);

  return (
    <div className="banner-container">
    <section className="banner-section">
      <div className="swiper banner-swiper">
        <div className="swiper-wrapper">

          {/* Слайд 1 */}
          <div className="swiper-slide banner-slide">
            <img src="/images/banner1.png" alt="Реабілітаційне обладнання" className="banner-img" />
          </div>

          {/* Слайд 2 */}
          <div className="swiper-slide banner-slide">
            <img src="/images/banner2.png" alt="Підтримка кожному" className="banner-img" />
          </div>

          {/* Слайд 3 */}
          <div className="swiper-slide banner-slide">
            <img src="/images/banner3.png" alt="Сучасні рішення" className="banner-img" />
          </div>

        </div>
        <div className="swiper-pagination"></div>
      </div>
    </section>
    </div>
  );
};
