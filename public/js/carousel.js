class Carousel {
  constructor(self, target, elements, options = null) {
    this.self = self;
    this.elements = elements;
    this.targetDiv = document.getElementById(target);
    this.currentImg = 0;
    this.display = "block";
    this.autoscroll = 0;
    this.scrollInterval = null;
    this.title = "";
    this.lockClick = false;

    for (var prop in options) {
      switch (prop) {
        case "display":
          this.display = options.display;
          break;
        case "autoscroll":
          this.autoscroll = options.autoscroll;
          break;
        case "title":
          this.title = options.title;
          break;
      }
    }

    this.init();
    this.container = document.getElementById(this.self + "-container");

    if (this.elements.length != 0) {
      this.render();

      if (this.autoscroll > 0) {
        this.scrollInterval = setInterval(() => {
          ++this.currentImg;
          this.currentImg %= this.elements.length;
          this.render();
        }, this.autoscroll);
      }
    }
  }

  click() {
    if (this.lockClick) {
      this.lockClick = false;
      return;
    }

    clearInterval(this.scrollInterval);

    for (var prop in this.elements[this.currentImg]) {
      if (prop == "onclick") {
        this.elements[this.currentImg].onclick();
        return;
      }
    }
  }

  next() {
    this.lockClick = true;

    ++this.currentImg;
    if (this.currentImg == this.elements.length) {
      this.currentImg = 0;
    }

    if (this.scrollInterval != null) {
      clearInterval(this.scrollInterval);
    }
    this.render();
  }

  prev() {
    this.lockClick = true;

    --this.currentImg;
    if (this.currentImg < 0) {
      this.currentImg = this.elements.length - 1;
    }

    if (this.scrollInterval != null) {
      clearInterval(this.scrollInterval);
    }
    this.render();
  }

  set(index) {
    this.lockClick = true;

    this.currentImg = index;

    if (this.scrollInterval != null) {
      clearInterval(this.scrollInterval);
    }
    this.render();
  }

  setContent(elements) {
    this.elements = elements;
    this.currentImg = 0;

    this.render();
    this.preload();
  }

  render() {
    var caption = "&nbsp;";
    for (var prop in this.elements[this.currentImg]) {
      if (prop == "caption") {
        caption = this.elements[this.currentImg].caption;
      }
    }

    var html = "";

    if (this.display == "block") {
      html += '<h2 class="caption">' + caption + '</h2><div class="display">' +
              '<img src="' + this.elements[this.currentImg].img + '" class="big-img" /></div><ul>';

      for (var i = 0; i < this.elements.length; ++i) {
        html += '<li><img src="' + this.elements[i].img + '"';
        if (this.currentImg == i) {
          html += 'class="selected"';
        }
        html += 'onclick="' + this.self + '.set(' + i + ')" /></li>';
      }
      html += '</ul>';

    } else if (this.display == "inline") {
      html += '<div class="inline-display"><img src="' + this.elements[this.currentImg].img + '" class="big-img" />' +
              '<div class="dots"><ol>';

      for (var i = 0; i < this.elements.length; ++i) {
        html += '<li';
        if (this.currentImg == i) {
          html += ' class="selected"';
        }
        html += ' onclick="' + this.self + '.set(' + i + ')"></li>';
      }
      html += '</ol>';
    }

    this.container.innerHTML = html;
  }

  init() {
    var html = "";

    if (this.display == "block") {
      html = '<h1 class="title">' + this.title + '</h1>' +
             '<div class="prev"><img src="images/icons/lArrow.png" onclick="' + this.self + '.prev()" /></div>' +
             '<div class="img-container" id="' + this.self + '-container" onclick="' + this.self + '.click()"></div>' +
             '<div class="next"><img src="images/icons/rArrow.png" onclick="' + this.self + '.next()" /></div>';
    } else if (this.display == "inline") {
      this.targetDiv.setAttribute("onclick", this.self + ".click()");
      html = '<div class="controls"><h1 class="title">' + this.title + '</h1>' +
             '<div class="prev"><img src="images/icons/lArrow.png" onclick="' + this.self + '.prev()" /></div>' +
             '<div class="next col-xs-offset-8"><img src="images/icons/rArrow.png" onclick="' + this.self + '.next()" /></div></div>' +
             '<div class="inline-container" id="' + this.self + '-container"></div>';
    }

    html += '<div class="preload" id="' + this.self + '-preload"></div>';
    this.targetDiv.innerHTML = html;

    this.preload();
  }

  preload() {
    var html = "";

    for (var i = 0; i < this.elements.length; ++i) {
      html += '<img src="' + this.elements[i].img + '" />';
    }

    document.getElementById(this.self + "-preload").innerHTML = html;
  }
}
