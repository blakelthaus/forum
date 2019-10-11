#resize-image.py

import sys
import PIL
from PIL import Image

baseWidth = int(sys.argv[1])
baseHeight = int(sys.argv[2])
filePath = sys.argv[3]
file = sys.argv[4]

print(baseHeight)
print(baseWidth)
print(filePath)
print(file)

img = Image.open(filePath + file)

newImage = img.resize((baseWidth, baseHeight), PIL.Image.ANTIALIAS)

img.save(filePath + 'resized-images/' + file)


