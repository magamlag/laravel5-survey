"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require("@angular/core");
var platform_browser_1 = require("@angular/platform-browser");
var platform_browser_dynamic_1 = require("@angular/platform-browser-dynamic");
var http_1 = require("@angular/http");
var Question = (function () {
    function Question() {
    }
    return Question;
}());
var HttpService = (function () {
    function HttpService(http) {
        this.http = http;
    }
    HttpService.prototype.getData = function () {
        return this.http.get('/api/question');
    };
    return HttpService;
}());
HttpService = __decorate([
    core_1.Injectable(),
    __metadata("design:paramtypes", [http_1.Http])
], HttpService);
var AppComponent = (function () {
    function AppComponent(httpService) {
        this.httpService = httpService;
    }
    AppComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.httpService.getData().subscribe(function (data) { return _this.user = data.json(); });
    };
    return AppComponent;
}());
AppComponent = __decorate([
    core_1.Component({
        selector: 'oprosnik',
        template: "\n\t\t\t<div class=\"panel panel-default\"  *ngFor=\"let question of questions\">\n\t<div class=\"panel-heading\">{{ question?.title }}</div>\n\t<div class=\"panel-body\">\n\t\t<div class=\"radio\">\n\t\t\t<label>\n\t\t\t\t<input type=\"radio\" name=\"optionsRadios{{ question?.id }}\" id=\"{{ question?.a1id }}\" value=\"option1\" checked>\n\t\t\t    {{ question?.a1 }}\n\t\t\t</label>\n\t\t</div>\n\t\t<div class=\"radio\">\n\t\t  <label>\n\t\t    <input type=\"radio\" name=\"optionsRadios{{ question?.id }}\" id=\"{{ question?.a2id }}\" value=\"option2\">\n\t\t    {{ question?.a2 }}\n\t\t  </label>\n\t\t</div>\n\t\t<div class=\"radio\">\n\t\t\t<label>\n\t\t\t    <input type=\"radio\" name=\"optionsRadios{{ question?.id }}\" id=\"{{ question?.a3id }}\" value=\"option1\" checked>\n\t\t\t    {{ question?.a3 }}\n\t\t\t</label>\n\t\t</div>\n\t\t<div class=\"radio\">\n\t\t\t<label>\n\t\t\t    <input type=\"radio\" name=\"optionsRadios{{ question?.id }}\" id=\"{{ question?.a4id }}\" value=\"option2\">\n\t\t\t    {{ question?.a4 }}\n\t\t\t</label>\n\t\t</div>\n\t</div>\n</div>\n    ",
        providers: [HttpService]
    }),
    __metadata("design:paramtypes", [HttpService])
], AppComponent);
var HelloAngularAppModule = (function () {
    function HelloAngularAppModule() {
    }
    return HelloAngularAppModule;
}());
HelloAngularAppModule = __decorate([
    core_1.NgModule({
        imports: [platform_browser_1.BrowserModule, http_1.HttpModule],
        declarations: [AppComponent],
        bootstrap: [AppComponent]
    })
], HelloAngularAppModule);
platform_browser_dynamic_1.platformBrowserDynamic().bootstrapModule(HelloAngularAppModule);
//# sourceMappingURL=main.js.map