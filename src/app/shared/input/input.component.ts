import { Component, OnInit,Input, ContentChild, AfterContentInit} from '@angular/core';
import {NgModel} from '@angular/forms'

@Component({
  selector: 'mt-input-container',
  templateUrl: './input.component.html'
})
export class InputComponent implements OnInit {

  input: any
  @Input() label: string
  @Input() errorMessage?: string

  @ContentChild(NgModel) model: NgModel

  constructor() { }

  ngOnInit() {
  }
  ngAfterContentInit(){
       this.input = this.model
       if(this.input === undefined){
         console.log('Esse componente precisa ser usado com uma diretiva ngModel ou formControlName')
       }
     }
     hasSuccess():boolean{
       return this.input.valid && (this.input.dirty || this.input.touched)
     }
     hasError():boolean{
       return this.input.invalid && (this.input.dirty || this.input.touched)

     }
}
