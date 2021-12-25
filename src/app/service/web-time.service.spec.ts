import { TestBed } from '@angular/core/testing';

import { WebTimeService } from './web-time.service';

describe('WebTimeService', () => {
  let service: WebTimeService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(WebTimeService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
