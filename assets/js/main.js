!(function (W) {
  W(function () {
    var r = {
        action: "tsproducts",
        _wpnonce: tirestan.nonce,
        paged: 1,
        return_filters: tirestan.is_shop ? "true" : "",
        is_initial: "true",
      },
      e = !1,
      n = {
        "passenger-tire": { width: 205, aspect_ratio: 55, size: 16 },
        tbr: { width: 235, aspect_ratio: 75, size: 17.5 },
      },
      t = W("body"),
      i = W(".ts-items"),
      o = W(".ts-loading-wrap"),
      s = W(".ts-search"),
      a = W(".ts-search-tab"),
      c = W(".ts-search-car"),
      p = W(".ts-filter-specs-width"),
      d = W(".ts-filter-specs-aspectRatio"),
      l = W(".ts-filter-specs-size");
    1 === i.length &&
      (tirestan.is_shop
        ? ((r.tag = tirestan.tag || ""),
          (r.category = tirestan.category || ""),
          (r.width = tirestan.width || ""),
          (r.aspect_ratio = tirestan.aspect_ratio || ""),
          (r.size = tirestan.size || ""),
          (r.custom_tax_name = tirestan.tax_slug || ""),
          (r.custom_tax_value = tirestan.tax_value || ""),
          (r.car_brand = tirestan.car_brand || ""),
          (r.car_model = tirestan.car_model || ""),
          (r.car_year = tirestan.car_year || ""),
          (r.brand = tirestan.tire_brand || ""),
          r.custom_tax_name && r.custom_tax_value && (r.custom_tax = "true"),
          r.car_brand && r.car_model && r.car_year && (r.custom_car = "true"))
        : ts_query &&
          ((r.category = ts_query.category || ""),
          (r.custom_tax_name = ts_query.tax_slug || ""),
          (r.custom_tax_value = ts_query.tax_value || ""),
          r.custom_tax_name && r.custom_tax_value && (r.custom_tax = "true")),
      z(!0),
      W(window).on("resize", function () {
        H(I());
      })),
      t.on("click", ".ts-shop-pagination a", function () {
        (r.paged += 1), z(!1);
      }),
      W(document).on("mouseenter", ".ts-shop-item-thumbnail", function () {
        var t;
        1024 <= W(window).width() &&
          "row" === I() &&
          !e &&
          ("off" === (t = W(this).parents(".ts-shop-item").find(".ts-shop-preview-wrap")).attr("data-status")
            ? (function (s) {
                e = !0;
                var a = s.parents(".ts-shop-item").find(".ts-shop-item-thumbnail-loading");
                a.fadeIn(),
                  g(
                    { action: "tspreview", id: s.attr("data-id") },
                    function (t) {
                      s.html(t.preview);
                      t = s.find(".ts-shop-preview");
                      s.attr("data-status", "on"), W(".ts-shop-preview").hide(), t.show(), a.fadeOut(), (e = !1);
                    },
                    !1
                  );
              })(t)
            : ((t = t.find(".ts-shop-preview")), W(".ts-shop-preview").hide(), t.show()));
      }),
      t.on("mousemove", function () {
        W(".ts-shop-preview").hide();
      }),
      t.on("mousemove", ".ts-shop-item-thumbnail", function (t) {
        t.stopPropagation();
      }),
      t.on("mousemove", ".ts-shop-preview", function (t) {
        t.stopPropagation();
      }),
      t.on("change", ".ts-shop-item-quantity select", function () {
        x(W(this).parents(".ts-prd"), "shop");
      }),
      t.on("change", ".ts-shop-preview-quantity select", function () {
        x(W(this).parents(".ts-shop-preview"), "preview");
      }),
      t.on("change", ".ts-product-item-quantity select", function () {
        x(W(this).parents(".ts-prd"), "product");
      });
    var h,
      u,
      f,
      m,
      v,
      b,
      w = W(".ts-order-tracking-header");
    function g(t, a, s) {
      s && o.fadeIn(),
        (t._wpnonce = tirestan.nonce),
        W.post(tirestan.ajax_url, t, function (t, s) {
          "success" === s ? ((t = JSON.parse(t)), a(t)) : alert("مشکلی در ارتباط با سرور رخ داد!"), o.fadeOut();
        });
    }
    function _() {
      (r.size = ""), (r.brand = ""), (r.return_filters = "true");
    }
    function y() {
      g(
        { action: "tsyithbrands", category: q() },
        function (t) {
          !(function (t) {
            var s,
              a = "";
            for (s in t)
              (a += '<div class="ts-column ts-col-4 ts-search-content-brand-item">'),
                (a += '<a href="' + t[s].url + '">'),
                (a += '<img src="' + t[s].thumbnail + '" alt="' + t[s].slug + '" title="' + t[s].name + '" />'),
                (a += "</a></div>");
            W(".ts-search-content-brand-item").remove(), W(".ts-search-content-brand-wrap").prepend(a);
          })(t.brands);
        },
        !0
      );
    }
    function C(t) {
      a.find("div").removeClass("ts-search-tab-active"),
        W("#ts-search-tab-" + t).addClass("ts-search-tab-active"),
        W(".ts-search-content").hide(),
        W("#ts-search-content-" + t).show();
      var s = 14;
      "passenger-tire" === q()
        ? "brand" === t
          ? (s = 48)
          : "car" === t && (s = 81)
        : "specs" === t
        ? (s = 22)
        : "brand" === t && (s = 72),
        a.find("i").css({ right: s + "%" });
    }
    function k(s) {
      var t = q(),
        a = { action: "tsfilterspecs", category: t };
      s
        ? "width" === s
          ? (a.width = p.val())
          : "aspect_ratio" === s && ((a.width = p.val()), (a.aspect_ratio = d.val()))
        : ((a.width = n[t].width), (a.aspect_ratio = n[t].aspect_ratio), (a.is_initial = "true")),
        g(
          a,
          function (t) {
            !(function (t, s) {
              var a,
                e = "",
                i = "",
                o = "";
              if (s) {
                if ("width" === s) {
                  for (a in t.aspect_ratio)
                    i += '<option value="' + t.aspect_ratio[a] + '">' + t.aspect_ratio[a] + "</option>";
                  for (a in t.size) o += '<option value="' + t.size[a] + '">' + t.size[a] + "</option>";
                  d.html(i), l.html(o);
                } else if ("aspect_ratio" === s) {
                  for (a in t.size) o += '<option value="' + t.size[a] + '">' + t.size[a] + "</option>";
                  l.html(o);
                }
              } else {
                for (a in t.width) e += '<option value="' + t.width[a] + '">' + t.width[a] + "</option>";
                for (a in t.aspect_ratio)
                  i += '<option value="' + t.aspect_ratio[a] + '">' + t.aspect_ratio[a] + "</option>";
                for (a in t.size) o += '<option value="' + t.size[a] + '">' + t.size[a] + "</option>";
                p.html(e),
                  d.html(i),
                  l.html(o),
                  (function () {
                    var t,
                      s = q(),
                      a = {
                        width: ".ts-filter-specs-width",
                        aspect_ratio: ".ts-filter-specs-aspectRatio",
                        size: ".ts-filter-specs-size",
                      };
                    for (t in a)
                      n[s][t] && 0 < W(a[t] + ' option[value="' + n[s][t] + '"]').length && W(a[t]).val(n[s][t]);
                  })();
              }
            })(t.specs, s);
          },
          !0
        );
    }
    function z(t) {
      t && (r.paged = 1),
        g(
          r,
          function (t) {
            !(function (t) {
              r.return_filters &&
                (function (t) {
                  if (tirestan.is_shop || r.return_filters) {
                    r.return_filters = "";
                    var s,
                      a = '<option value="">همه</option>',
                      e = a,
                      i = a,
                      o = a,
                      n = a;
                    if (r.is_initial) {
                      for (s in t.width) e += '<option value="' + t.width[s] + '">' + t.width[s] + "</option>";
                      p.html(e);
                    }
                    if (r.is_initial || !r.aspect_ratio) {
                      for (s in t.aspect_ratio)
                        i += '<option value="' + t.aspect_ratio[s] + '">' + t.aspect_ratio[s] + "</option>";
                      d.html(i);
                    }
                    for (s in t.size) o += '<option value="' + t.size[s] + '">' + t.size[s] + "</option>";
                    for (s in t.brand) n += '<option value="' + t.brand[s] + '">' + t.brand[s] + "</option>";
                    l.html(o),
                      W("#ts-shop-filter-brand").html(n),
                      (r.is_initial = ""),
                      (function () {
                        var t,
                          s = {
                            width: ".ts-filter-specs-width",
                            aspect_ratio: ".ts-filter-specs-aspectRatio",
                            size: ".ts-filter-specs-size",
                            brand: "#ts-shop-filter-brand",
                          };
                        for (t in s) r[t] && 0 < W(s[t] + ' option[value="' + r[t] + '"]').length && W(s[t]).val(r[t]);
                      })();
                  }
                })(t.filters),
                1 === r.paged
                  ? (i.html(t.products.items), i.append(t.products.pagination))
                  : W(t.products.items).insertBefore(".ts-shop-pagination-wrap"),
                parseInt(r.paged) === parseInt(t.products.pages) && W(".ts-shop-pagination-wrap").empty();
              var s = W("#ts-shop-sort-total-items"),
                a = W("#ts-shop-sort-total-pages");
              0 < s.length && 0 < a.length && (s.html(t.products.total), a.html(t.products.pages)),
                x("", "all"),
                H(I());
            })(t);
          },
          !0
        );
    }
    function x(t, s) {
      t
        ? 4 <= parseInt(t.find(".ts-prd-quantity").find("select").val()) &&
          !t.find(".ts-prd-shipping").hasClass("ts-prd-shipping-normal")
          ? "shop" === s
            ? t.find(".ts-shop-item-shipping").removeClass("ts-shop-item-shipping-disabled")
            : "preview" === s
            ? t.find(".ts-shop-preview-shipping").find("h6").html("ارسال رایگان")
            : "product" === s && t.find(".ts-product-item-shipping").find("h6").html("ارسال رایگان")
          : "shop" === s
          ? t.find(".ts-shop-item-shipping").addClass("ts-shop-item-shipping-disabled")
          : "preview" === s
          ? t.find(".ts-shop-preview-shipping").find("h6").html("فاقد ارسال رایگان")
          : "product" === s && t.find(".ts-product-item-shipping").find("h6").html("فاقد ارسال رایگان")
        : W(".ts-shop-item").each(function () {
            4 <= parseInt(W(this).find(".ts-shop-item-quantity").find("select").val())
              ? W(this).find(".ts-shop-item-shipping").removeClass("ts-shop-item-shipping-disabled")
              : W(this).find(".ts-shop-item-shipping").addClass("ts-shop-item-shipping-disabled"),
              !W(this)
                .find(".ts-shop-preview-shipping")
                .children(".ts-prd-shipping")
                .hasClass("ts-prd-shipping-normal") &&
              4 <= parseInt(W(this).find(".ts-shop-preview-quantity").find("select").val())
                ? W(this).find(".ts-shop-preview-shipping").find("h6").html("ارسال رایگان")
                : W(this).find(".ts-shop-preview-shipping").find("h6").html("فاقد ارسال رایگان");
          });
    }
    function q() {
      return tirestan.is_shop ? r.category || "" : W(".ts-search-header-tab-active").attr("data-category");
    }
    function D(t) {
      W("html, body").animate({ scrollTop: W("#" + t).offset().top - 70 }, 500);
    }
    function P(t) {
      W(".ts-product-nav").find("ul").find("a").removeClass("ts-product-nav-active"),
        W("#" + t).addClass("ts-product-nav-active");
    }
    function I() {
      if (1280 <= W(window).width()) {
        if (tirestan.is_shop) {
          var t = W(".ts-shop-sort-layout-active");
          return 0 < t.length ? t.attr("data-layout") : "row";
        }
        return ts_query
          ? !ts_query.layout || ("row" !== ts_query.layout && "column" !== ts_query.layout)
            ? "row"
            : ts_query.layout
          : "row";
      }
      return 1024 <= W(window).width() && W(window).width(), "column";
    }
    function H(t) {
      var s = W(".ts-shop-sort-layout");
      0 < s.length &&
        (s.find("i").removeClass("ts-shop-sort-layout-active"),
        s.find('i[data-layout="' + t + '"]').addClass("ts-shop-sort-layout-active"));
      var a = W(".ts-shop-items"),
        e = W(".ts-shop-item-wrap"),
        i = W(".ts-shop-item"),
        o = W(".ts-shop-item-header"),
        n = W(".ts-shop-item-body"),
        r = W(".ts-shop-item-footer"),
        s = W(".ts-shop-item-end");
      a.removeClass("ts-shop-items-column"),
        e.removeClass("ts-col-4"),
        e.removeClass("ts-col-6"),
        e.removeClass("ts-col-12"),
        i.removeClass("ts-shop-item-column"),
        o.removeClass("ts-col-2"),
        n.removeClass("ts-col-6"),
        r.removeClass("ts-col-4"),
        s.removeClass("ts-col-12"),
        "row" === t
          ? (e.addClass("ts-col-12"),
            o.addClass("ts-col-2"),
            n.addClass("ts-col-6"),
            r.addClass("ts-col-4"),
            s.addClass("ts-col-12"))
          : (a.addClass("ts-shop-items-column"),
            e.addClass(
              "ts-col-" +
                (1280 <= W(window).width() ? 4 : 768 <= W(window).width() && W(window).width() < 1280 ? 6 : 12)
            ),
            i.addClass("ts-shop-item-column"));
    }
    function O() {
      W(".ts-order-tracking").animate({ right: -400 }, 500), w.attr("data-status", "close");
    }
    w.on("click", function () {
      "close" === W(this).attr("data-status")
        ? (W(".ts-order-tracking").animate({ right: 0 }, 500), w.attr("data-status", "open"))
        : O();
    }),
      t.on("click", function () {
        O();
      }),
      t.on("click", ".ts-order-tracking", function (t) {
        t.stopPropagation();
      }),
      t.on("click", ".ts-order-tracking-header", function (t) {
        t.stopPropagation();
      }),
      1 === s.length && (k(), y()),
      (1 !== s.length && 1 !== c.length) ||
        g(
          { action: "tscarbrands" },
          function (t) {
            var s,
              a = '<option value="">همه</option>';
            for (s in t.brands) a += '<option value="' + t.brands[s] + '">' + t.brands[s] + "</option>";
            W(".ts-search-brand").html(a);
          },
          !0
        ),
      W(".ts-search-brand").on("change", function () {
        W(".ts-search-brand").val(W(this).val());
        var t = W(this).val();
        t &&
          g(
            { action: "tscarmodels", brand: t },
            function (t) {
              var s,
                a = '<option value="">همه</option>';
              for (s in t.models) a += '<option value="' + t.models[s] + '">' + t.models[s] + "</option>";
              W(".ts-search-model").html(a), W(".ts-search-year").html("");
            },
            !0
          );
      }),
      W(".ts-search-model").on("change", function () {
        W(".ts-search-model").val(W(this).val());
        var t = W(".ts-search-brand").val(),
          s = W(this).val();
        t &&
          s &&
          g(
            { action: "tscaryears", brand: t, model: s },
            function (t) {
              var s,
                a = '<option value="">همه</option>';
              for (s in t.years) a += '<option value="' + t.years[s] + '">' + t.years[s] + "</option>";
              W(".ts-search-year").html(a);
            },
            !0
          );
      }),
      W("#ts-shop-filter-car").on("click", function () {
        W(".ts-search-car").fadeIn();
      }),
      W(".ts-search-car-close").on("click", function () {
        W(".ts-search-car").fadeOut();
      }),
      t.on("click", function () {
        W(".ts-search-car").fadeOut();
      }),
      t.on("click", "#ts-shop-filter-car", function (t) {
        t.stopPropagation();
      }),
      t.on("click", ".ts-search-car", function (t) {
        t.stopPropagation();
      }),
      W(".ts-search-car-submit, #ts-search-submit-byCar").on("click", function () {
        var t = W(".ts-search-brand").val(),
          s = W(".ts-search-model").val(),
          a = W(".ts-search-year").val();
        t && s && a
          ? (window.location = tirestan.shop_url + "?car_brand=" + t + "&car_model=" + s + "&pro_year=" + a)
          : alert("لطفا مشخصات خودرو را بصورت کامل وارد کنید");
      }),
      W(".ts-search-header-tab").on("click", function () {
        var t, s;
        W(this).hasClass("ts-search-header-tab-active") ||
          (W(".ts-search-header-tab").removeClass("ts-search-header-tab-active"),
          W(this).addClass("ts-search-header-tab-active"),
          (t = W(this).attr("data-category")),
          (s = a.find("div")),
          W(".ts-search-content").hide(),
          W("#ts-search-content-specs").show(),
          s.hide(),
          s.removeClass("ts-col-4"),
          s.removeClass("ts-col-6"),
          "passenger-tire" === t
            ? (s.addClass("ts-col-4"), s.show())
            : "tbr" === t &&
              (s.addClass("ts-col-6"), a.find("#ts-search-tab-specs").show(), a.find("#ts-search-tab-brand").show()),
          k(),
          y(),
          C("specs"));
      }),
      a.find("div").on("click", function () {
        W(this).hasClass("ts-search-tab-active") || C(W(this).attr("data-tab"));
      }),
      W("#ts-search-submit-bySpecs").on("click", function () {
        var t = p.val(),
          s = d.val(),
          a = l.val(),
          e = W(".ts-search-header-tab-active").attr("data-category");
        window.location = tirestan.shop_url + "?width=" + t + "&aspect_ratio=" + s + "&size=" + a + "&category=" + e;
      }),
      p.on("change", function () {
        tirestan.is_shop ? ((r.width = W(this).val()), (r.aspect_ratio = ""), _(), z(!0)) : k("width");
      }),
      d.on("change", function () {
        tirestan.is_shop ? ((r.aspect_ratio = W(this).val()), _(), z(!0)) : k("aspect_ratio");
      }),
      l.on("change", function () {
        tirestan.is_shop && ((r.size = W(this).val()), z(!0));
      }),
      tirestan.is_shop &&
        (W(".ts-shop-sidebar-toggle").on("click", function () {
          W(".ts-shop-sidebar").css({ display: "block" });
        }),
        W(".ts-shop-sidebar-close").on("click", function () {
          W(".ts-shop-sidebar").css({ display: "none" });
        }),
        W(".ts-shop-sidebar-item-header")
          .find("i")
          .on("click", function () {
            var t = W(this).parents(".ts-shop-sidebar-item");
            t.hasClass("ts-shop-sidebar-item-disabled")
              ? t.removeClass("ts-shop-sidebar-item-disabled")
              : t.addClass("ts-shop-sidebar-item-disabled"),
              t.find(".ts-shop-sidebar-item-body").slideToggle();
          }),
        W(window).on("scroll", function () {
          var t, s, a, e, i;
          1024 <= W(window).width() &&
            ((t = W(".ts-shop-sidebar")),
            (a = (s = (i = W(".ts-shop-container")).offset().top) + i.outerHeight()),
            (i = (e = W(this).scrollTop()) + t.outerHeight() + 100),
            e < s
              ? (t.hasClass("ts-shop-sidebar-dynamic") && t.removeClass("ts-shop-sidebar-dynamic"),
                t.hasClass("ts-shop-sidebar-static-bottom") && t.removeClass("ts-shop-sidebar-static-bottom"),
                t.hasClass("ts-shop-sidebar-static-top") || t.addClass("ts-shop-sidebar-static-top"))
              : s - 45 <= e && i <= a
              ? (t.hasClass("ts-shop-sidebar-static-top") && t.removeClass("ts-shop-sidebar-static-top"),
                t.hasClass("ts-shop-sidebar-static-bottom") && t.removeClass("ts-shop-sidebar-static-bottom"),
                t.hasClass("ts-shop-sidebar-dynamic") || t.addClass("ts-shop-sidebar-dynamic"))
              : a < i &&
                (t.hasClass("ts-shop-sidebar-static-top") && t.removeClass("ts-shop-sidebar-static-top"),
                t.hasClass("ts-shop-sidebar-dynamic") && t.removeClass("ts-shop-sidebar-dynamic"),
                t.hasClass("ts-shop-sidebar-static-bottom") || t.addClass("ts-shop-sidebar-static-bottom")));
        }),
        W("#ts-shop-filter-brand").on("change", function () {
          (r.brand = W(this).val()), z(!0);
        }),
        W("#ts-shop-filter-express").on("change", function () {
          (r.express = W(this).prop("checked") ? "true" : ""), z(!0);
        }),
        W("#ts-shop-filter-inStock").on("change", function () {
          (r.in_stock_only = W(this).prop("checked") ? "true" : ""), z(!0);
        }),
        W(".ts-shop-sort")
          .find("a")
          .on("click", function () {
            W(this).hasClass("ts-shop-sort-active") ||
              (W(".ts-shop-sort").find("a").removeClass("ts-shop-sort-active"),
              (r.orderby = W(this).attr("data-sort")),
              W(this).addClass("ts-shop-sort-active"),
              z(!0));
          }),
        W(".ts-shop-sort-layout")
          .find("i")
          .on("click", function () {
            W(this).hasClass("ts-shop-sort-layout-active") || H(W(this).attr("data-layout"));
          })),
      tirestan.is_product &&
        ((h = W("#ts-product-info")),
        (u = W("#ts-product-gallery")),
        (f = W("#ts-product-review")),
        (m = W("#ts-product-table")),
        (v = W("#ts-product-performance")),
        (b = W("#ts-product-related")),
        x(W(".ts-product-item"), "product"),
        // W(window).on("scroll", function () {
        //   var t = W("#ts-product-nav");
        //   1280 <= W(window).width() &&
        //     (W(this).scrollTop() > W("#ts-product-info").offset().top - 120 ? t.slideDown() : t.slideUp());
        // }),
        // W(window).on("scroll", function () {
        //   var t, s, a, e, i, o, n, r, c, p, d, l;
        //   1280 <= W(this).width() &&
        //     ((t = (l = h.offset().top - 80) + h.outerHeight() - 80),
        //     (a = (s = u.offset().top - 80) + u.outerHeight() - 80),
        //     (i = (e = f.offset().top - 80) + f.outerHeight() - 80),
        //     (n = (o = m.offset().top - 80) + m.outerHeight() - 80),
        //     (c = (r = v.offset().top - 80) + v.outerHeight() - 80),
        //     (d = (p = b.offset().top - 80) + b.outerHeight() - 80),
        //     l <= (l = W(this).scrollTop()) && l < t
        //       ? P("ts-product-nav-tab-info")
        //       : s <= l && l < a
        //       ? P("ts-product-nav-tab-gallery")
        //       : e <= l && l < i
        //       ? P("ts-product-nav-tab-review")
        //       : o <= l && l < n
        //       ? P("ts-product-nav-tab-table")
        //       : r <= l && l < c
        //       ? P("ts-product-nav-tab-performance")
        //       : p <= l && l < d && P("ts-product-nav-tab-related"));
        // }),
        W("#ts-product-item-tab-info").on("click", function (t) {
          t.preventDefault(), D("ts-product-info");
        }),
        W("#ts-product-nav-tab-info").on("click", function (t) {
          t.preventDefault(), D("ts-product-info");
        }),
        W("#ts-product-item-tab-gallery").on("click", function (t) {
          t.preventDefault(), D("ts-product-gallery");
        }),
        W("#ts-product-nav-tab-gallery").on("click", function (t) {
          t.preventDefault(), D("ts-product-gallery");
        }),
        W("#ts-product-item-tab-review").on("click", function (t) {
          t.preventDefault(), D("ts-product-review");
        }),
        W("#ts-product-nav-tab-review").on("click", function (t) {
          t.preventDefault(), D("ts-product-review");
        }),
        W("#ts-product-item-tab-table").on("click", function (t) {
          t.preventDefault(), D("ts-product-table");
        }),
        W("#ts-product-nav-tab-table").on("click", function (t) {
          t.preventDefault(), D("ts-product-table");
        }),
        W("#ts-product-item-tab-performance").on("click", function (t) {
          t.preventDefault(), D("ts-product-performance");
        }),
        W("#ts-product-nav-tab-performance").on("click", function (t) {
          t.preventDefault(), D("ts-product-performance");
        }),
        W("#ts-product-item-tab-related").on("click", function (t) {
          t.preventDefault(), D("ts-product-related");
        }),
        W("#ts-product-nav-tab-related").on("click", function (t) {
          t.preventDefault(), D("ts-product-related");
        }),
        0 < (t = W(".ts-prd-thumbnail").find("img")).length &&
          1024 <= W(window).width() &&
          t.elevateZoom({
            zoomWindowPosition: 11,
            zoomWindowHeight: 350,
            zoomWindowWidth: 350,
            borderSize: 2,
            easing: !0,
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            scrollZoom: !0,
          }),
        0 < W(".swiper-container").length &&
          new Swiper(".swiper-container", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: { el: ".swiper-pagination", clickable: !0 },
            breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1024: { slidesPerView: 3 } },
          }));
  });
})(jQuery);
