<div class="rectangle">
    <div class="group-ngoai-khoi-sach">
        <div class="group-tach-khoi-sach">
            {{-- === KHỐI 1: CHI TIẾT TIỀN PHẠT === --}}
            <div class="group-khoi-sach">
                <div class="title-khoi-sach">Chi tiết tiền phạt</div>

                {{-- Sách 1 --}}
                <div class="khung-chung-sach-lch">
                    <div class="khung-chu-sach-lch">
                        <div class="text-wrapper-8">Nhà giả kim</div>
                        <div class="text-wrapper-9">Tác giả: Paulo Coelho</div>
                        <div class="muc-date-phat">
                            <div class="text-wrapper-7">Hạn trả: 1/1/2024</div>
                            <div class="text-wrapper-7">Ngày trả: 5/1/2024</div>
                            <div class="text-wrapper-7">Số ngày trễ: 4 ngày</div>
                            <div class="text-wrapper-7">Phạt/ngày: 5.000đ</div>
                        </div>
                    </div>
                    <div class="khung-anh-sach-lch">
                        <div class="text-wrapper-13">20.000đ</div>
                        <div class="rectangle-12">
                            <div class="text-wrapper-12 tra-tre">Chưa thanh toán</div>
                        </div>
                    </div>
                </div>

                {{-- Sách 2 --}}
                <div class="khung-chung-sach-lch">
                    <div class="khung-chu-sach-lch">
                        <div class="text-wrapper-8">Đắc Nhân Tâm</div>
                        <div class="text-wrapper-9">Tác giả: Dale Carnegie</div>
                        <div class="muc-date-phat">
                            <div class="text-wrapper-7">Hạn trả: 15/12/2023</div>
                            <div class="text-wrapper-7">Ngày trả: 16/12/2023</div>
                            <div class="text-wrapper-7">Số ngày trễ: 1 ngày</div>
                            <div class="text-wrapper-7">Phạt/ngày: 5.000đ</div>
                        </div>
                    </div>
                    <div class="khung-anh-sach-lch">
                        <div class="text-wrapper-13">5.000đ</div>
                        <div class="rectangle-12">
                            <div class="text-wrapper-12 tra-tre">Chưa thanh toán</div>
                        </div>
                    </div>
                </div>

                {{-- Tổng tiền phạt --}}
                <div class="rectangle-tong-tien-phat">
                    <div class="text-tong-phat">Tổng tiền phạt:</div>
                    <div class="so-tien-phat">25.000đ</div>
                </div>
            </div>

            {{-- === KHỐI 2: PHƯƠNG THỨC THANH TOÁN === --}}
            <div class="group-khoi-sach">
                <div class="title-khoi-sach">Phương thức thanh toán</div>

                {{-- Phương thức 1: Chuyển khoản --}}
                <div class="khung-chung-sach-lch thanh-toan active">
                    <div class="khung-anh-sach-lch">
                        <img class="image circle-pick" src="{{ asset('images/circle-active.png') }}" alt="Chọn" />
                        <img class="image" src="{{ asset('images/iconstack.io - (Bank Duotone).png') }}" alt="Ngân hàng" />
                    </div>
                    <div class="khung-chu-sach-lch">
                        <div class="text-wrapper-8">Chuyển khoản ngân hàng</div>
                        <div class="text-wrapper-9">Chuyển khoản qua ATM hoặc Internet Banking</div>
                    </div>
                </div>

                {{-- Phương thức 2: Tiền mặt --}}
                <div class="khung-chung-sach-lch thanh-toan">
                    <div class="khung-anh-sach-lch">
                        <img class="image circle-pick" src="{{ asset('images/circle-gray.png') }}" alt="Chưa chọn" />
                        <img class="image" src="{{ asset('images/iconstack.io - (Hand Money).png') }}" alt="Tiền mặt" />
                    </div>
                    <div class="khung-chu-sach-lch">
                        <div class="text-wrapper-8">Thanh toán tiền mặt</div>
                        <div class="text-wrapper-9">Thanh toán trực tiếp tại quầy thư viện</div>
                    </div>
                </div>

                {{-- Thông tin chuyển khoản --}}
                <div class="rectangle-thong-tin-chuyen-khoan">
                    <div class="title-thong-tin-chuyen-khoan">Thông tin chuyển khoản</div>
                    <div class="body-thong-tin-chuyen-khoan">
                        <div class="body-detail-thong-tin-ck">
                            <div class="text-detail-ck">Ngân hàng:</div>
                            <div class="text-info-ck">Ngân hàng TMCP Á Châu (ACB)</div>
                        </div>
                        <div class="body-detail-thong-tin-ck">
                            <div class="text-detail-ck">Số tài khoản:</div>
                            <div class="text-info-ck">123456789</div>
                        </div>
                        <div class="body-detail-thong-tin-ck">
                            <div class="text-detail-ck">Chủ tài khoản:</div>
                            <div class="text-info-ck">THU VIEN TRUONG DAI HOC</div>
                        </div>
                        <div class="body-detail-thong-tin-ck">
                            <div class="text-detail-ck">Nội dung:</div>
                            <div class="text-info-ck">THANHTOANPHAT 1761183993875</div>
                        </div>
                    </div>

                    <div class="footer-detail-thong-tin-ck">
                        <div class="text-footer-ck">Số tiền:</div>
                        <div class="text-footer-info-ck">25.000đ</div>
                    </div>
                </div>

                {{-- Nút thanh toán --}}
                <a class="rectangle-thanh-toan" href="{{ url('user/content-trangphat-thanhtoan') }}">
                    <img class="img-thanh-toan" src="{{ asset('images/iconstack.io - (Credit Card 2 Back Fill).png') }}" alt="Thanh toán" />
                    <div class="text-thanh-toan">Thanh toán 25.000đ</div>
                </a>
            </div>
        </div>
    </div>
</div>
