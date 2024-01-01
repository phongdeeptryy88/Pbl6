import time
from flask import Flask, request
import pymysql
import sqlparse

app = Flask(__name__)

# Danh sách từ khóa nguy hiểm
dangerous_keywords = ['abc', 'delete', 'secret']

def check_keywords(username, password):
    # Kiểm tra xem tên người dùng hoặc mật khẩu có chứa từ khóa nguy hiểm hay không
    for keyword in dangerous_keywords:
        if keyword in username.lower() or keyword in password.lower():
            return True
    return False

def check_ip_in_log(ip_address):
    # Kiểm tra xem địa chỉ IP có tồn tại trong tệp tin log hay không
    with open('login_log.txt', 'r') as file:
        ips = file.read().splitlines()
        if ip_address in ips:
            return True
    return False
@app.route('/', methods=['POST'])
def login_proxy():
            result = 1
            ip_address = request.remote_addr
            print(f'IP Address: {ip_address}')
            current_time = time.strftime('%Y-%m-%d %H:%M:%S')
            with open('login_ip.txt', 'a') as file:
                file.write(f'{current_time} - IP Address: {ip_address}\n')
            if check_ip_in_log(ip_address):
                result = 0

            username = request.form.get('user')
            password = request.form.get('pass')
            print(f'User: {username}')
            print(f'Pass: {password}')

            query = "SELECT * FROM users WHERE username='{username}' AND password='{password}'"
            print("Query:", query)

            if check_keywords(username, password):
                # Ghi vào log
                with open('login_log.txt', 'a') as file:
                    file.write(f'{ip_address}\n')
                result = 0
            if result == 1:
                    return 'true'
            elif result == 0: 
                    return 'false'
          

if __name__ == '__main__':
    app.run(host='0.0.0.0')