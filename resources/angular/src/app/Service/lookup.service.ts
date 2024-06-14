import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { LookupResponse } from '../lookup_response.interface';

@Injectable({
  providedIn: 'root',
})
export class LookupService {
  private baseUrl = 'http://laravel.test';

  constructor(private http: HttpClient) {}

  query(ip: string): Observable<LookupResponse> {
    return this.http.get<LookupResponse>(`${this.baseUrl}/lookup?ip=${ip}`);
  }
}
