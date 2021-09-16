import { Component, OnInit } from '@angular/core';
import { AuthService } from './../../../../services/auth.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AppService } from './app.service';

@Component({
  selector: 'app-admin-dashboard',
  templateUrl: './admin-dashboard.component.html',
  styleUrls: ['./admin-dashboard.component.css']
})
export class AdminDashboardComponent implements OnInit {

 
  constructor(private auth: AuthService, private formbuilder: FormBuilder) {}

 
  ngOnInit() {
  }

  logout(): void {
    this.auth.logout();
  }

}
