import { LoginComponent } from './components/login/login.component';
import { HomeComponent } from './home/home.component';
import { NgModule } from '@angular/core';
import { AuthGuard } from './guards/auth.guard';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [

  { path: 'login', component: LoginComponent },
  { path: '', component: HomeComponent },
  { path: 'admin', 
  canActivate: [AuthGuard],
  loadChildren: () => import('./modules/admin/admin.module').then((m) => m.AdminModule) }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}