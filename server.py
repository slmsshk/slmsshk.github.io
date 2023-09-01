import http.server
import socketserver
import os
import threading
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

# Define the directory to serve
root_dir = "."  # Set this to the directory where your HTML, CSS, and JS files are located

# Define the port to run the server on
port = 8000

# Set up a simple HTTP server
handler = http.server.SimpleHTTPRequestHandler
httpd = socketserver.TCPServer(("", port), handler)

print(f"Serving at port {port}...")
print(f"Directory: {os.path.abspath(root_dir)}")

# Function to refresh the page whenever there are changes
def refresh_on_change():
    class ChangeHandler(FileSystemEventHandler):
        def on_any_event(self, event):
            if event.is_directory:
                return
            if event.event_type in ["modified", "created", "deleted"]:
                print(f"Changes detected: Reloading the page...")
                httpd.shutdown()

    event_handler = ChangeHandler()
    observer = Observer()
    observer.schedule(event_handler, path=root_dir, recursive=True)
    observer.start()
    try:
        httpd.serve_forever()
    except KeyboardInterrupt:
        observer.stop()
    observer.join()

# Start the server in a separate thread
server_thread = threading.Thread(target=refresh_on_change)
server_thread.daemon = True
server_thread.start()

# Wait for user input to stop the server
try:
    while True:
        input()
except KeyboardInterrupt:
    print("Server stopped.")
