import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { RouterModule } from '@angular/router';
import{ROUTES} from './app.routes'
import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { HomeComponent } from './home/home.component';
import{ContatosServices} from './contatos/contatos.service';
import { ContatosComponent } from './contatos/contatos.component';
import { ContatoComponent } from './contatos/contato/contato.component';
import { CadastrarComponent } from './cadastrar/cadastrar.component'
import { FormsModule ,ReactiveFormsModule} from '@angular/forms';
import { InputComponent } from './shared/input/input.component';


@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    HomeComponent,
    ContatosComponent,
    ContatoComponent,
    CadastrarComponent,
    InputComponent,
  ],
  imports: [
    BrowserModule,
    HttpModule,
    RouterModule.forRoot(ROUTES),
    FormsModule
  ],
  providers: [ContatosServices],
  bootstrap: [AppComponent]
})
export class AppModule { }
