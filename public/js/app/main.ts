import { Component, NgModule, Injectable } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';

import { HttpModule, Http }   from '@angular/http';

class Question{
    title: string;
    id: number;
    a1: string;
    a1id: number;
    a2: string;
    a2id: number;
    a3: string;
    a3id: number;
    a4: string;
    a4id: number;
}

@Injectable()
class HttpService{
 
    constructor(private http: Http){ }
     
    getData(){
        return this.http.get('/api/question')
    }
}

@Component({
    selector: 'oprosnik',
    template: `
			<div class="panel panel-default"  *ngFor="let question of questions">
	<div class="panel-heading">{{ question?.title }}</div>
	<div class="panel-body">
		<div class="radio">
			<label>
				<input type="radio" name="optionsRadios{{ question?.id }}" id="{{ question?.a1id }}" value="option1" checked>
			    {{ question?.a1 }}
			</label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="optionsRadios{{ question?.id }}" id="{{ question?.a2id }}" value="option2">
		    {{ question?.a2 }}
		  </label>
		</div>
		<div class="radio">
			<label>
			    <input type="radio" name="optionsRadios{{ question?.id }}" id="{{ question?.a3id }}" value="option1" checked>
			    {{ question?.a3 }}
			</label>
		</div>
		<div class="radio">
			<label>
			    <input type="radio" name="optionsRadios{{ question?.id }}" id="{{ question?.a4id }}" value="option2">
			    {{ question?.a4 }}
			</label>
		</div>
	</div>
</div>
    `,
    providers: [HttpService]
})
class AppComponent implements OnInit { 
  
    questions: Question[];
     
    constructor(private httpService: HttpService){}
     
    ngOnInit(){
         
        this.httpService.getData().subscribe((data: Response) => this.user=data.json());
    }
}

@NgModule({
    imports: [ BrowserModule, HttpModule ],
    declarations: [ AppComponent ],
    bootstrap: [ AppComponent ]
})
class HelloAngularAppModule {}

platformBrowserDynamic().bootstrapModule(HelloAngularAppModule);